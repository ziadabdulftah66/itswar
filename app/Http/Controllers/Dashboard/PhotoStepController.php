<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageRequest;
use App\Http\Requests\MistakeRequest;
use App\Models\HomePage;
use App\Models\Mistake;
use App\Models\PhotoStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoStepController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:pages_home', ['only' => ['edit','update']]);
//
//    }


    public function edit()
    {

        $steps = PhotoStep::all();

        return view('dashboard.pages.steps', compact('steps'));
    }


    public function update(Request $request,$id){

        $PhotoStep = PhotoStep::find($id);

        if($request->has('photo')) {

       //     $photo= delete_photo($PhotoStep->photo);// magic method to delete path of image
            $filename=uploadimage('steps', $request->photo);// magic method to create path of image

            PhotoStep::where('id', $PhotoStep->id)->update(['photo' => $filename]);
        }



        $PhotoStep->update($request->except('photo'));




        return redirect()->back()->with('success', 'تم التعديل بنجاح');


    }
}
