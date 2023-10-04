<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermsPageRequest;
use App\Models\TermsPage;


class TermsPageController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('can:pages_terms', ['only' => ['edit','update']]);
//
//    }
    public function edit()
    {
        $terms = TermsPage::find(1);
        return view('dashboard.pages.terms_and_conditions', compact('terms'));
    }


    public function update(TermsPageRequest $request)
    {

        $terms = TermsPage::find(1);

        $terms->update([
            'terms_title'=>$request->terms_title,
            'terms_desc'=>$request->terms_desc,
        ]);

        return redirect(route('pages.index'))->with('success', 'تم التعديل بنجاح');

    }
}
