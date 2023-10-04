<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\QuestionPage;
use Illuminate\Http\Request;
use Validator;

class QuestionController extends Controller
{
    public function create(){
        $questions = QuestionPage::get();
        return view('dashboard.pages.questions', compact('questions'));
    }
    public function store(Request $request){
        $validator= Validator::make($request->all(),[

            'question' => 'required',
            'answer'=>'required',


        ],[

            'question.required'=>'ادخل السؤال',
            'answer.required'=>'ادخل الاجابة',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        try {

            $question=QuestionPage::create($request->all());
            return redirect()->back()->with(['success' => 'تم الاضافة بنجاح']);
        }catch (Exception $ex) {

            return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
        }
    }

    public function update(Request $request,$question_id){
        $validator= Validator::make($request->all(),[

            'question' => 'min:1',
            'answer'=>'min:1',


        ],[

            'question.min'=>'ادخل السؤال',
            'answer.min'=>'ادخل الاجابة',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        try {

            $question=QuestionPage::find($question_id);
            if(!$question) {
                return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
            }
            else {

            $question->update($request->all());

                return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
            }
        }catch (Exception $ex) {

            return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
        }
    }
}
