<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\PhotoType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Itswar extends Component
{
    use WithFileUploads;
    public $CurrentStep=1;
    public $order;
//    public $PhotoType;
//    public $image;

    public function mount()
    {
//        $this->cards = Card::all();

//        $this->title = __('Order Image');

        $this->order = Order::create();

//        try {
//            $ip = IP::where('ip' , request()->ip())->first();

//            $this->visitedBefore = $ip->visited_step_page;

//            $ip->update([
//                'visited_step_page' => true
//            ]);

//        } catch (\Throwable $th) {
//            $this->visitedBefore = false;
//        }
    }


    public function render()
    {
        $PhotoTypes=PhotoType::get();

        return view('livewire.itswar',compact('PhotoTypes'));
    }
    public function firstStepSubmit(){
        $this->CurrentStep=1;
    }
    public function secondStepSubmit(){
//        $this->validate([
//           'PhotoType'=>'required']
//        ,[
//            'PhotoType.required'=>'هذا الحقل مطلوب'
//            ]);
        $this->CurrentStep=2;
    }
    public function thirdStepSubmit(){
//        $this->validate([
//                'image'=>'required']
//            ,[
//                'image.required'=>'يجب ارفاق الصورة'
//            ]);

        $this->CurrentStep=3;
    }
    public function fourthStepSubmit(){
        $this->CurrentStep=4;
    }
    public function fifthStepSubmit(){
        $this->CurrentStep=5;
    }
}
