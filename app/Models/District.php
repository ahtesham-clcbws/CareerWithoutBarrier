<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // Apply Global Scope for 'isActive'
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('isActive', 1);
        });
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'Id');
    }

    public function students()
    {
        return $this->hasMany(Student::class)->select('district_id', 'id', 'name');
    }

    public function getRemainingForms()
    {
        $totalForms = $this->total_forms;
        $filledForms = $this->students()->count(); // Count students who have filled the form

        return $totalForms - $filledForms; // Remaining forms
    }
}
