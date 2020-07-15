<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    protected $table = 'kelurahans';
    protected $fillable = ['kelurahan_name'];
}
