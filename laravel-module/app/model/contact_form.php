<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class contact_form extends Model
{
    protected $table="contact_forms";
    protected $primaryKey="id";
    protected $fillable=['name','email','mobile_no','message'];
}
