<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_users extends Model
{
    protected $table="mypro_users";
    protected $primaryKey="id";
    protected $fillable=['name','email','mobile_no','address','pin_code','status','password'];
}
