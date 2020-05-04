<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningDB extends Model
{
    protected $table = 'warningdb';
    protected $fillable = [
        'from',
        'to',
        'approved_by',
        'employee',
        'reason',
        'bagian',
        'created_by',
        'updated_by',
        'type',
    ];
}
