<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentCode extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'stud_id');
    }

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(CouponCode::class, 'coupan_code', 'couponcode');
    }

    public function examCenter(): BelongsTo
    {
        return $this->belongsTo(Center::class, 'exam_center', 'id')->select('id', 'center_name as name');
    }
}
