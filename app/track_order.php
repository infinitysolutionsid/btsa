<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class track_order extends Model
{
    protected $table = 'track_orders';
    protected $fillable = [
        'order_id',
        'receiver',
        'sender',
        'receiver_city',
        'sender_city',
        'created_by',
        'updated_by',
        'order_status', 'activity', 'payload', 'receiver_address', 'sender_address', 'stuff_desc'
    ];
}
