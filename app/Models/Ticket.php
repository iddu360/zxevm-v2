<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        't_no', 't_evid', 't_event', 't_validity', 't_type', 't_price', 't_qty', 't_user'
    ];

    protected $casts = [
        't_validity' => 'date',
        't_price' => 'decimal:2',
        't_qty' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 't_evid', 'ev_id');
    }
}
