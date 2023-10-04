<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomePageRequest;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:pages_home', ['only' => ['edit','update']]);
//
//    }


    public function edit()
    {

        $home = HomePage::find(1);

        return view('dashboard.pages.home', compact('home'));
    }


    public function update(HomePageRequest $request){

        $home = HomePage::find(1);

        if ($request->file('example_one_photo')  ) {
            $destination = 'public/assets/images/pages/home';
            $photo = $request->example_one_photo;
            $example_one_photo = $photo->hashName();
            $photo->move($destination, $example_one_photo);
            $home->example_one_photo = $example_one_photo;
            $home->update(['example_one_photo'=>$example_one_photo]);
        }
        if ($request->file('example_two_photo')  ) {
            $destination = 'public/assets/images/pages/home';
            $photo = $request->example_two_photo;
            $example_two_photo = $photo->hashName();
            $photo->move($destination, $example_two_photo);
            $home->example_two_photo= $example_two_photo;
            $home->update(['example_two_photo'=>$example_two_photo]);
        }
        if ($request->file('example_three_photo')  ) {
            $destination = 'public/assets/images/pages/home';
            $photo = $request->example_three_photo;
            $example_three_photo = $photo->hashName();
            $photo->move($destination, $example_three_photo);
            $home->example_three_photo = $example_three_photo;
            $home->update(['example_three_photo'=>$example_three_photo]);
        }

        if ($request->file('example_four_photo')  ) {
            $destination = 'public/assets/images/pages/home';
            $photo = $request->example_four_photo;
            $example_four_photo = $photo->hashName();
            $photo->move($destination, $example_four_photo);
            $home->example_four_photo = $example_four_photo;
            $home->update(['example_four_photo'=>$example_four_photo]);
        }


        $home->update($request->except('example_one_photo','example_two_photo','example_three_photo','example_four_photo'));


        $home->save();

        return redirect(route('pages.index'))->with('success', 'تم التعديل بنجاح');


    }
}
