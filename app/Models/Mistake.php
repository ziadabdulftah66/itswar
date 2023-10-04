<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    use HasFactory;
     protected $table='mistakes';
    protected $guarded = [];
    public $timestamps=false;

    public function getMistakeOnePhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/mistakes/'.$value):"";
    }
    public function getMistakeTwoPhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/mistakes/'.$value):"";
    }
    public function getMistakeThreePhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/pages/mistakes/'.$value):"";
    }





}
