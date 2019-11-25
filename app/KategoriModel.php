<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = 'jadwalkapal';
    protected $fillable = ['created_by', 'updated_by', 'kotaasal', 'kotatujuan', 'vessel', 'voy', 'closingdate', 'etd', 'eta', 'created_by', 'updated_by'];
}
