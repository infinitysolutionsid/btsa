<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VesselM extends Model
{
    protected $table = 'vessel';
    protected $primaryKey = 'vessel_id';
    protected $fillable = ['created_by', 'updated_by', 'vessel'];
}
