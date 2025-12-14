<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'v_id', 'v_name', 'v_location', 'v_capacity', 'v_type', 'v_facilities', 
        'v_contact', 'v_avail', 'v_cost'
    ];

    protected $casts = [
        'v_capacity' => 'integer',
        'v_avail' => 'boolean',
        'v_cost' => 'decimal:2',
    ];
}
