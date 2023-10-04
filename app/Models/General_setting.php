<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General_setting extends Model
{
    use HasFactory;
    protected $table='general_settings';
    protected $guarded=[];
    
    public function getSitelogoheaderAttribute($value){
        return ($value!==null)?asset('public/assets/images/settings/'.$value):"";
    }
    public function getSitelogofooterAttribute($value){
        return ($value!==null)?asset('public/assets/images/settings/'.$value):"";
    }
    public function getSitelogoIconAttribute($value){
        return ($value!==null)?asset('public/assets/images/settings/'.$value):"";
    }
}
