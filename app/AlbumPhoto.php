<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    protected $table = 'album_photos';
    protected $fillable = ['album_id', 'filename'];
}
