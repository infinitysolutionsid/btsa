<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messagesDB extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'type', 'from_id', 'to_id', 'body', 'attachment', 'seen'
    ];
}
