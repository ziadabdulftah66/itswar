<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\SocialSettingRequest;
use App\Models\Social_setting;
use Illuminate\Http\Request;

class SocialSettingController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:social_settings', ['only' => ['index']]);
//        $this->middleware('can:social_settings', ['only' => ['update']]);
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $setting=Social_setting::find(1);
        return view('dashboard.settings.social_edit',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialSettingRequest $request, $id)
    {
        try {
            $setting = Social_setting::find($id);
            if (!$setting)
                return redirect()->route('SocialSettings.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);


            $setting->update($request->except('_token','id'));

            return redirect()->route('SocialSettings.index')->with(['success' => 'تم التعديل بنجاح']);
        }
        catch (\Exception $ex ){
            return redirect()->route('SocialSettings.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
