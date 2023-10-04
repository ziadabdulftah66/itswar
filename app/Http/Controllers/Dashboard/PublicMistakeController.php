<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageRequest;
use App\Http\Requests\MistakeRequest;
use App\Models\HomePage;
use App\Models\Mistake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicMistakeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:pages_home', ['only' => ['edit','update']]);
//
//    }


    public function edit()
    {

        $home = Mistake::find(1);

        return view('dashboard.pages.mistakes', compact('home'));
    }


    public function update(MistakeRequest $request){

        $home = Mistake::find(1);

        if ($request->file('mistake_one_photo')  ) {
            $destination = 'public/assets/images/pages/mistakes';
            $photo = $request->mistake_one_photo;
            $mistake_one_photo = $photo->hashName();
            $photo->move($destination, $mistake_one_photo);
            $home->mistake_one_photo = $mistake_one_photo;
            $home->update(['mistake_one_photo'=>$mistake_one_photo]);
        }
        if ($request->file('mistake_two_photo')  ) {
            $destination = 'public/assets/images/pages/mistakes';
            $photo = $request->mistake_two_photo;
            $mistake_two_photo = $photo->hashName();
            $photo->move($destination, $mistake_two_photo);
            $home->mistake_two_photo= $mistake_two_photo;
            $home->update(['mistake_two_photo'=>$mistake_two_photo]);
        }
        if ($request->file('mistake_three_photo')  ) {
            $destination = 'public/assets/images/pages/mistakes';
            $photo = $request->mistake_three_photo;
            $mistake_three_photo = $photo->hashName();
            $photo->move($destination, $mistake_three_photo);
            $home->mistake_three_photo = $mistake_three_photo;
            $home->update(['mistake_three_photo'=>$mistake_three_photo]);
        }




        $home->update($request->except('mistake_one_photo','mistake_two_photo','mistake_three_photo'));


        $home->save();

        return redirect(route('pages.index'))->with('success', 'تم التعديل بنجاح');


    }
}
