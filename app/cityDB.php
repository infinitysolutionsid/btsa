<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cityDB extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    protected $fillable = ['city_name', 'created_by', 'updated_by'];
}
