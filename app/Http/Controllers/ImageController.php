<?php

namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\FaceDetection\FaceDetector;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use function Livewire\str;

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

    public function removebg(Request $requset, Order $order,\ArPHP\I18N\Arabic $arabic)
{
    $cropperImage = false;

    try {

        $order->clearMediaCollection('main');

        $order->addMediaFromBase64($requset->image)
            ->usingFileName('custom.jpeg')
            ->toMediaCollection('main');


    $response = $this->remove($order->image());
////
//   file_put_contents($order->imagePath(),$response);
      //  $response = Http::get('http://10.0.0.3:5000/?url=' . $order->image());


        file_put_contents($order->imagePath(),$response);

        // add background
        if ($requset->bgcolor) {

            $originalImage = Image::make($order->imagePath());

            // create empty canvas
        $img = Image::canvas($originalImage->width(), $originalImage->height());
        //    $img = Image::canvas(500, 500,$requset->bgcolor);


            $img->fill($requset->bgcolor);

            // fill image with tiled image
           $img->fill($order->imagePath());


            $img->save($order->imagePath());
        }

        $fileName = uniqid() . '.jpeg';

        $imagePath = storage_path('app/public/uploads/' . $fileName);

        File::copy($order->imagePath(), $imagePath);

        $imageUrl = url('storage/app/public/uploads/' . $fileName);

        $image = Image::make($imagePath);

        $width = $image->width();

        $height  = $image->height();

        $image->resize(800, 1200)->save($imagePath);

        if ($requset->hasWaterMark) {
            $image->insert(public_path('logo/filter.png'), 'center')->save($imagePath);

            Image::make($imagePath)->resize($width, $height)->save($imagePath);
        }
    } catch (\Throwable $th) {
        Log::error($th->getMessage());
        return response(
            [

                'reload'    => true,
                'error'     => $th->getMessage()
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
    return response()->json([
        'imageUrl'      => $imageUrl,
        'cropperImage'  => $cropperImage
    ]);
}
//    public function removebg(Request $requset, Order $order)
//    {
//        $cropperImage = false;
//
//        try {
//            $folderPath = public_path('images/');
//            $image_parts = explode(";base64,", $requset->image);
//            $image_type_aux = explode("image/", $image_parts[0]);
//            $image_type = $image_type_aux[1];
//            $image_base64 = base64_decode($image_parts[1]);
//            // $file = $folderPath . uniqid() . '.png';
//            $filename = time() . '.'. $image_type;
//            $file =$folderPath.$filename;
//            file_put_contents($file, $image_base64);
////
////     $response = Http::get($order->image());
////
////    file_put_contents($order->imagePath(),$order->image());
//            //  $response = Http::get('http://10.0.0.3:5000/?url=' . $order->image());
//
//
////        file_put_contents($order->imagePath(), base64_decode($requset->image));
//
//            // add background
//            if ($requset->bgcolor) {
//
//                $originalImage = Image::make($file);
//
//                // create empty canvas
//                $img = Image::canvas($originalImage->width(), $originalImage->height());
//                //    $img = Image::canvas(500, 500,$requset->bgcolor);
//
//
//                $img->fill($requset->bgcolor);
//
//                // fill image with tiled image
//                $img->fill($file);
//
//
//                $img->save($file);
//            }
//
////            $fileName = uniqid() . '.jpeg';
////
////            $imagePath = storage_path('app/public/uploads/' . $fileName);
////
////            File::copy($order->imagePath(), $file);
////
////            $imageUrl = url('storage/app/public/uploads/' . $fileName);
//
//            $image = Image::make($file);
//
//            $width = $image->width();
//
//            $height  = $image->height();
//
//            $image->resize(800, 1200)->save($file);
//
//            if ($requset->hasWaterMark) {
//                $image->insert(public_path('logo/filter.png'), 'center')->save($file);
//
//                Image::make($file)->resize($width, $height)->save($file);
//            }
//            $Image = new \App\Models\Image();
//            $Image->photo = $filename;
//            $Image->save();
//        } catch (\Throwable $th) {
//            Log::error($th->getMessage());
//            return response(
//                [
//                    'reload'    => true,
//                    'error'     => $th->getMessage()
//                ],
//                Response::HTTP_INTERNAL_SERVER_ERROR
//            );
//        }
//        return response()->json([
//            'imageUrl'      => $Image->photo,
//            'cropperImage'  => $cropperImage
//        ]);
//    }
    public function upload(Request $request)
    {
        $input = $request->all();
        $rules = ['imageUpload' => 'required'];
        $messages = [];
        $validator = Validator::make($request->all() , $rules, $messages);
        if ($validator->fails())
        {
            $arr = array( "status" => 400, "msg" => $validator->errors() ->first(), "result" => array());
        }
        else
        {
            try
            {
                if ($input['base64image'] || $input['base64image'] != '0') {

                    $folderPath = public_path('images/');
                    $image_parts = explode(";base64,", $input['base64image']);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    // $file = $folderPath . uniqid() . '.png';
                    $filename = time() . '.'. $image_type;
                    $file =$folderPath.$filename;
                    file_put_contents($file, $image_base64);
///
                    $originalImage = Image::make($file);

                    // create empty canvas
                    $img = Image::canvas($originalImage->width(), $originalImage->height(),'#0D62FC');
                    //    $img = Image::canvas(500, 500,$requset->bgcolor);


                    $img->fill('#0D62FC');

                    // fill image with tiled image
                    $img->fill($file);



                    $width = $img->width();

                    $height  = $img->height();

                    $img->resize(800, 1200)->save($file);

//                    if ($requset->hasWaterMark) {
                    $img->insert(public_path('logo/filter.png'), 'center')->save($file);

                        Image::make($file)->resize($width, $height)->save($file);
//                    }


///
                    $Image = new Image;
                    $Image->image = $filename;
                    $Image->save();
                }
                $msg = 'Image upload successfully.';

            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2]))
                {
                    $msg = $ex->errorInfo[2];
                }
                \Session::flash('error', $msg);

            }
            catch(Exception $ex)
            {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2]))
                {
                    $msg = $ex->errorInfo[2];
                }
                \Session::flash('error', $msg);
            }
        }
        // $this->index();
        return redirect('/');
    }
    public function remove($img){
        $path=str_replace('https://i-tswr.web2html5.com/storage','https://i-tswr.web2html5.com/storage/app/public/',$img);

        $client = new Client();
        $res = $client->post('https://api.remove.bg/v1.0/removebg', [
            'multipart' => [
                [
                    'name'     => 'image_url',
                    'contents' => $path
                ],

            ],
            'headers' => [
                'X-Api-Key' => 'd66deUg6Q7Hzg7oNd4W3kr1d'
            ]
        ]);
return $res->getBody();
        $fp = fopen("no-bg.png", "wb");
        fwrite($fp, $res->getBody());
        fclose($fp);

// The API key
        $apiKey = 'd66deUg6Q7Hzg7oNd4W3kr1d';

// The image URL or path
        $imageUrl = $img;

// API endpoint
        $apiUrl = 'https://api.remove.bg/v1.0/removebg';

// Create a new HTTP POST request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the request headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-Api-Key: ' . $apiKey,
        ]);

// Set the request form data
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'image_url' => $imageUrl, // or use 'image_file' for local file upload
        ]);

// Send the request
        $response = curl_exec($ch);

// Check for errors
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
            exit;
        }

// Close the request
        curl_close($ch);

// Process the response
        $data = json_decode($response, true);

// Check if the API call was successful
        if (isset($data['error'])) {
            echo 'API Error: ' . $data['error']['title'];
            exit;
        }

// The URL of the image with removed background
        $removedImageUrl = $data;

// Now you can use the $removedImageUrl to display or further process the image
return $removedImageUrl;

    }

}
