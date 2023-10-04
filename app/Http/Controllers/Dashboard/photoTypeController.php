<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\PhotoType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class photoTypeController extends Controller
{
    public function index(){
        $photoTypes=PhotoType::get();
        return view('dashboard.photoTypes.index', compact('photoTypes'));

    }
    public function create()
    {
        return view('dashboard.photoTypes.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|',
            'discription' => 'required|',
            'min_discription' => 'required|',
            'height'=>'required|numeric',
            'width'=>'required|numeric',
            'price'=>'required|numeric',
        ],[

            'title.required'=>'هذا الحقل مطلوب',
            'discription.required'=>'هذا الحقل مطلوب',
            'min_discription.required'=>'هذا الحقل مطلوب',

            'height.required'=>'هذا الحقل مطلوب',
            'height.numeric'=>'هذا الحقل  يجب ان يكون رقما',
            'width.required'=>'هذا الحقل مطلوب',
            'width.numeric'=>'هذا الحقل  يجب ان يكون رقما',
            'price.required'=>'هذا الحقل مطلوب',
            'price.numeric'=>'هذا الحقل  يجب ان يكون رقما',
        ]);


        try {

            DB::beginTransaction();

            $photoType = PhotoType::create($request->all());
            DB::commit();
            return redirect(route('photoType.index'))->with('success', 'تم إنشاء بيانات وثيقة جديدة بنجاح');

        }
        catch (\Exception $ex ){
            DB::rollback();
            return redirect()->route('photoType.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);
        }
    }
    public function edit($id)
    {

        $photoType = PhotoType::findOrfail($id);
        return view('dashboard.photoTypes.edit', compact('photoType'));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|',
            'discription' => 'required|',
            'min_discription' => 'required|',
            'height'=>'required|numeric',
            'width'=>'required|numeric',
            'price'=>'required|numeric',
        ],[

            'title.required'=>'هذا الحقل مطلوب',
            'discription.required'=>'هذا الحقل مطلوب',
            'min_discription.required'=>'هذا الحقل مطلوب',

            'height.required'=>'هذا الحقل مطلوب',
            'height.numeric'=>'هذا الحقل  يجب ان يكون رقما',
            'width.required'=>'هذا الحقل مطلوب',
            'width.numeric'=>'هذا الحقل  يجب ان يكون رقما',
            'price.required'=>'هذا الحقل مطلوب',
            'price.numeric'=>'هذا الحقل  يجب ان يكون رقما',
        ]);




           try {
        DB::beginTransaction();
        $PhotoType = PhotoType::findOrFail($id);



        $PhotoType->update($request->all());

        DB::commit();

        return redirect()->route('photoType.index')->with(['success' => 'تم التعديل بنجاح']);


        }
        catch (\Exception $ex ){
            DB::rollback();
            return redirect()->route('photoType.index')->with(['error' => 'هناك مشكله حاول في وقت لاحق']);
        }
    }
    public function destroy($id)
    {

        $PhotoType=PhotoType::find($id);
        if(!$PhotoType){
            return redirect()->route('photoType.index')->with(['error' => 'هذا الوثيقة غير موجود']);
        }

        $PhotoType->orders()->delete();

        $PhotoType->delete();


        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);



    }
}
