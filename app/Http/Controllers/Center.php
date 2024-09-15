<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Center extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id')->select('id', 'name');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(District::class, 'city_id', 'id')->select('id', 'name');
    }
}
