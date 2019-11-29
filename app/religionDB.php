<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class religionDB extends Model
{
    protected $table = 'religion';
    protected $primaryKey = 'religion_id';
    protected $fillable = ['religion_name', 'created_by', 'updated_by'];
}
