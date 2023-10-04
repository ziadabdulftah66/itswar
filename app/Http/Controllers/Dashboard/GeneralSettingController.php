<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\General_setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class GeneralSettingController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:general_settings', ['only' => ['index']]);
//        $this->middleware('can:general_settings', ['only' => ['update']]);
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=General_setting::find(1);
        return view('dashboard.settings.edit',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
    public function update(SettingRequest $request, $id)
    {
        try {
            $setting = General_setting::find($id);
            if (!$setting)
                return redirect()->route('settings.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);

            if($request->has('site_logo_icon')) {

                if($setting->site_logo_icon != null and  File::exists('public/assets/images/settings/'.$setting->site_logo_icon)) {
//return $setting->site_logo_header;
                    $photo = delete_photo($setting->site_logo_icon);
                    $filename_icon=uploadimage('settings',$request->site_logo_icon);
                    // magic method to create path of image
                    $setting->update(['site_logo_icon' => $filename_icon]);
                }
                else {

                    $filename_icon = uploadimage('settings', $request->site_logo_icon);

                    // magic method to create path of image

                    $setting->update(['site_logo_icon' => $filename_icon]);

                }

            }
            if($request->has('site_logo_header')) {
                  if($setting->site_logo_header != null  and  File::exists('public/assets/images/settings/'.$setting->site_logo_header)) {
                      $photo = delete_photo($setting->site_logo_header);
                      $filename=uploadimage('settings',$request->site_logo_header);// magic method to create path of image
                      General_setting::where('id', $setting->id)->update(['site_logo_header' => $filename]);
                  }
                $filename=uploadimage('settings',$request->site_logo_header);// magic method to create path of image
                General_setting::where('id', $setting->id)->update(['site_logo_header' => $filename]);

            }
            if($request->has('site_logo_footer')) {
                if($setting->site_logo_footer != null and  File::exists('public/assets/images/settings/'.$setting->site_logo_footer)) {
                    $photo = delete_photo($setting->site_logo_footer);
                    $filename=uploadimage('settings',$request->site_logo_footer);// magic method to create path of image
                    General_setting::where('id', $setting->id)->update(['site_logo_footer' => $filename]);
                }
                $filename=uploadimage('settings',$request->site_logo_footer);// magic method to create path of image
                General_setting::where('id', $setting->id)->update(['site_logo_footer' => $filename]);

            }
            $setting->update($request->except('_token','site_logo_header','site_logo_footer','id','site_logo_icon'));

            return redirect()->route('settings.index')->with(['success' => 'تم التعديل بنجاح']);
        }
        catch (\Exception $ex ){
            return redirect()->route('settings.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
