<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getExampleOnePhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/home/'.$value):"";
    }
    public function getExampleTwoPhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/home/'.$value):"";
    }
    public function getExampleThreePhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/home/'.$value):"";
    }
    public function getExampleFourPhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/home/'.$value):"";
    }




}
