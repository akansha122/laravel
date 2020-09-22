<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_feedback extends Model
{
    protected $table="mypro_feedbacks";
    protected $primaryKey="id";
    protected $fillable=['name','email','mobile_no','feedback_type','message'];

    //mypro_feedbacks
}
