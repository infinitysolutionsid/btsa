<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemModel extends Model
{
    //
    protected $table = 'legality';
    protected $primaryKey = 'legal_id';
    protected $fillable = ['legal_name', 'file', 'downloads', 'created_by', 'updated_by'];
}
