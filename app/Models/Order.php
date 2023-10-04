<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;
class Order extends Model implements HasMedia
{
    use HasFactory,HasImage;

    protected $table='orders';
    protected $guarded=[];


    public function type(){
        return $this->belongsTo(PhotoType::class,'type_id');
    }
    public function getPhotoAttribute($value){
        return ($value!==null)?asset('public/assets/images/orders/'.$value):"";
    }
}
