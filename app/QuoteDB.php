<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteDB extends Model
{
    protected $table = 'quote';
    protected $primaryKey = 'quote_id';
    protected $fillable = [
        'quotes_name',
        'status',
        'link_preview',
        'quotes_id',
        'logIP',
        'created_by',
        'updated_by',
    ];
}
