<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loker extends Model
{
    protected $table = 'loker';
    protected $primaryKey = 'loker_id';
    protected $fillable = ['available_position', 'created_by', 'updated_by'];
}
