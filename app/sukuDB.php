<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sukuDB extends Model
{
    protected $table = 'sukuIndonesia';
    protected $primaryKey = 'suku_id';
    protected $fillable = ['nama_suku', 'created_by', 'updated_by'];
}
