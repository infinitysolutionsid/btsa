<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidateDB extends Model
{
    protected $table = 'candidate';
    protected $primaryKey = 'candidate_id';
    protected $fillable = [
        'appliedposition',
        'profilephoto',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'NoKtp',
        'NoSim',
        'NoNpwp',
        'address',
        'provinces',
        'domisilis',
        'kecamatans',
        'kelurahans',
        'kelamin',
        'NoBpjs',
        'suku', 'agama',
        'golongandarah',
        'anak_ke',
        'alamatKtp',
        'alamatTinggal',
        'statusrumah',
        'email',
        'noHp',
        'filecv',
        'info_lowongan',
        'income',
        'req_datein',
        'fasilitas',
        'ktpfile',
        'simfile',
        'statusinterview',
        'kota_domisili',
        'pendidikan',
    ];
    public function getAvatar()
    {
        if (!$this->profilephoto) {
            return asset('file/default.jpg');
        }
        return asset('file/img' . $this->profilephoto);
    }
}
