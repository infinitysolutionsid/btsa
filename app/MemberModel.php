<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama_lengkap', 'username', 'email', 'password', 'role', 'status', 'remember_token', 'created_at', 'updated_at'];
}
