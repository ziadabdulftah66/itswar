<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\General_setting;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function index(){ 


        return view('dashboard.index');

    }
    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            Notification::where('notifiable_type','App\Models\Admin')->where('notifiable_id',Auth::id())->delete();
            return back();
        }


    }
}
