<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = [
        'ev_name', 'ev_id', 'ev_date0', 'ev_date1', 'ev_venue', 'ev_desc', 
        'ev_organiser', 'ev_type', 'ev_user', 'ev_capacity', 'ev_status', 'ev_entrance'
    ];

    protected $casts = [
        'ev_date0' => 'date',
        'ev_date1' => 'date',
        'ev_capacity' => 'integer',
        'ev_entrance' => 'decimal:2',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 't_evid', 'ev_id');
    }

    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
