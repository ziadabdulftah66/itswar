<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPage extends Model
{
    use HasFactory;
    protected $table='questions_page';
    protected $guarded=[];
    public $timestamps=false;
}
