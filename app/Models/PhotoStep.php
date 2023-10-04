<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoStep extends Model
{
    use HasFactory;

    protected $table='photo_steps';
    protected $guarded=[];
    public $timestamps=false;


    public function getPhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/steps/'.$value):"";
    }
}
