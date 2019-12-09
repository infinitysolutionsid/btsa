<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IRModel extends Model
{
    protected $table = 'issuereport_tb';
    protected $fillable = [
        'nama_lengkap', 'tanggal', 'jam', 'kendala', 'tujuan', 'status', 'logIP', 'created_by', 'updated_by',
    ];
    public function getAvatar()
    {
        if (!$this->profilephoto) {
            return asset('file/default.jpg');
        }
        return asset('file/img' . $this->profilephoto);
    }
}
