<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class track_report extends Model
{
    protected $table = 'track_reports';
    protected $fillable = [
        'track_id',
        'order_id',
        'current_location',
        'last_location',
        'status',
        'container_type_system',
        'estimated_arrival_date',
    ];
}
