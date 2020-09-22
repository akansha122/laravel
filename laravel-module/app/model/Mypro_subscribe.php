<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_subscribe extends Model
{
    protected $table="mypro_subscribes";
    protected $primaryKey="id";
    protected $fillable=['email'];
}
