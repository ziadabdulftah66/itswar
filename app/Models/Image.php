<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;
    public function getPhotoAttribute($value){
        return ($value!==null)?asset('public/images/'.$value):"";
    }
}
