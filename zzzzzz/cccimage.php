<?php


namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\FaceDetection\FaceDetector;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function checkFace()
    {
        request()->validate([
            'image' => 'file|image'
        ]);

        $image = request()->image->store('uploads', 'public');

        $imagePath = storage_path('app/public/' . $image);

        try {
            $detector = new FaceDetector(public_path('detection.dat'));

            $detector->faceDetect($imagePath);
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'image' => ['Image Dose not has face']
            ]);
        } finally {
            unlink($imagePath);
        }
    }

    public function removebg(Request $requset, Order $order, \ArPHP\I18N\Arabic $arabic)
    {
        $cropperImage = false;

        try {

            $order->clearMediaCollection('main');

            $order->addMediaFromBase64($requset->image)
                ->usingFileName('custom.jpeg')
                ->toMediaCollection('main');

            $response = Http::get('http://10.0.0.3:5000/?url=' . $order->image());

            file_put_contents($order->imagePath(), $response->body());

            // add background
            if ($requset->bgcolor) {

                $originalImage = Image::make($order->imagePath());

                // create empty canvas
                $img = Image::canvas($originalImage->width(), $originalImage->height());

                $img->fill($requset->bgcolor);

                // fill image with tiled image
                $img->fill($order->imagePath());

                $img->save($order->imagePath());
            }

            $fileName = uniqid() . '.jpeg';

            $imagePath = storage_path('app/public/uploads/' . $fileName);

            File::copy($order->imagePath(), $imagePath);

            $imageUrl = url('storage/uploads/' . $fileName);

            $image = Image::make($imagePath);

            $width = $image->width();

            $height = $image->height();

            $image->resize(800, 1200)->save($imagePath);

            if ($requset->hasWaterMark) {
                $image->insert(public_path('logo/filter.png'), 'center')->save($imagePath);

                Image::make($imagePath)->resize($width, $height)->save($imagePath);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response(
                [
                    'reload' => true,
                    'error' => $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        return response()->json([
            'imageUrl' => $imageUrl,
            'cropperImage' => $cropperImage
        ]);
    }
}
