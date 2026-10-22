<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageCounter extends Model
{
    use HasFactory;

    protected $table = 'homepage_counters';

    protected $fillable = [
        'slot_key',
        'top_title',
        'counter_value',
        'has_plus_icon',
        'bottom_title',
        'order',
    ];

    protected $casts = [
        'counter_value' => 'integer',
        'has_plus_icon' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Calculate count_start automatically as counter_value - 10 (minimum 0).
     */
    public function getCountStartAttribute(): int
    {
        return max(0, ((int) $this->counter_value) - 10);
    }
}
