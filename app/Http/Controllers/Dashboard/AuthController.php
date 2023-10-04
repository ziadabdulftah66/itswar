<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\General_setting;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function login(){

        $setting=General_setting::find(1);
        return view('dashboard.login',compact('setting'));
    }
    public function postlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $validator = validator::make($credentials, [
            'username' => 'required',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'هناك خطا في ادخال البيانات']);
        }
        $user=Admin::where('username',$request->username)->first();
        if ($user) {
            if ($user->block == 1) {
                return redirect()->back()->with(['error' => 'تم حظرك يرجي مراجعة الادارة']);
            }
        }

        if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('admin_dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا في ادخال البيانات']);
    }

    public function logout(){
        $guard=$this->getguard();
        $guard->logout();
        return redirect()->route('login.admin');
    }
    private function getguard(){
        return auth('admin');
    }
}
