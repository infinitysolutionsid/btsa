<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IRModel extends Model
{
    protected $table = 'issuereport_tb';
    protected $fillable = [
        'nama_lengkap', 'tanggal', 'jam', 'kendala', 'tujuan', 'status', 'logIP', 'created_by', 'updated_by',
    ];
}
