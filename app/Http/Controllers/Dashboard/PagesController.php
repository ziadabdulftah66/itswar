<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FunddingPage;
use App\Models\Page;
use App\Models\HomePage;
use App\Models\TermsPage;
use App\Models\WhoPage;
use Illuminate\Http\Request;



class PagesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:pages', ['only' => ['index']]);
//
//    }

    public function index()
    {
        return view('dashboard.pages.index');
    }


}



