<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile()
    {

        $user = Admin::find(auth('admin')->user()->id);

        return view('dashboard.edit_profile', compact('user'));

    }

    public function updateProfile(ProfileRequest $request)
    {
        //validate
        // db

//        try {

            $admin = Admin::find(auth('admin')->user()->id);


            if ($request->has('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id']);
            unset($request['password_confirmation']);

            $admin->update([
                'username'=>$request->username,
                'password'=>$request->password,
                'email'=>$request->email
            ]);

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

//        } catch (\Exception $ex) {
//            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
//
//        }

    }
}
