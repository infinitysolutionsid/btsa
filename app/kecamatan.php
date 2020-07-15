<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $fillable = ['kecamatan_name'];
}
