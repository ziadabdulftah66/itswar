<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoType extends Model
{
    use HasFactory;

    protected $table='photo_types';
    protected $guarded=[];

   public function orders(){
       return $this->hasMany(Order::class,'type_id');
   }
}
