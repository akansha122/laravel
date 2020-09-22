<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_feedback_type extends Model
{
    protected $table="mypro_feedback_types";
    protected $primaryKey="id";
    protected $fillable=['title','status'];
    
}
