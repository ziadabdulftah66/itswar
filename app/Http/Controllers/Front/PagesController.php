<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\CompanyConsultingPage;
use App\Models\FunddingPage;
use App\Models\Helps;
use App\Models\HomePage;
use App\Models\IndividualConsultingPage;
use App\Models\Mistake;
use App\Models\Partnerslider;
use App\Models\PhotoStep;
use App\Models\QuestionPage;
use App\Models\Review;
use App\Models\Service;
use App\Models\Servicepage;
use App\Models\Slider;
use App\Models\State;
use App\Models\UsageAgreement;
use App\Models\WhoPage;
use App\Models\TermsPage;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){



      $homes = HomePage::first();

        $video = Video::first();
     $mistakes=Mistake::first();
     $PhotoSteps=PhotoStep::get();



        return view('front.index',compact('homes','mistakes','video','PhotoSteps'), ['title' => 'الرئيسية']);
    }





    public function termsCondtions()
    {
        $page = TermsPage::first();
        return view('front.pages_static.terms_condtions',compact('page'), ['title' => 'الشروط والأحكام']);
    }

    public function question()
    {
        $agreements = QuestionPage::get();

        return view('front.pages_static.questions',compact('agreements'), ['title' => 'الاسئلة الشائعة']);
    }
    public function usageAgreement()
    {
        $mistakes=Mistake::first();
        $PhotoSteps=PhotoStep::get();
        return view('front.pages_static.usage_agreement',compact('mistakes','PhotoSteps'), ['title' => 'كيفية الاستخدام']);
    }
}
