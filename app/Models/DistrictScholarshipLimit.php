<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictScholarshipLimit extends Model
{
    use HasFactory;


    protected $fillable = [
        'district_id',
        'educationtype_id',
        'max_registration_limit'
    ];

    public function District()
    {
        return $this->belongsTo(District::class)->withoutGlobalScope('active');
    }
    public function EducationType()
    {
        return $this->belongsTo(EducationType::class, 'educationtype_id');
    }
    
    public function scopeForEducationType($query, $educationTypeId)
    {
        return $query->where('educationtype_id', $educationTypeId);
    }

    /**
     * Get the registration limit for a given district and education type.
     * Returns 0 if no limit is set.
     */
    public static function getLimit($districtId, $educationTypeId)
    {
        $limit = self::where('district_id', $districtId)
                    ->where('educationtype_id', $educationTypeId)
                    ->first();

        return $limit ? $limit->max_registration_limit : 0;
    }
}
