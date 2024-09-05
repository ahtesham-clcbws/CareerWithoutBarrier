<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCode extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class,'stud_id');
    }

    public function voucher(){
        return $this->belongsTo(CouponCode::class,'coupan_code','couponcode');
    }

    public function examCenter(){
        return $this->belongsTo(Center::class,'exam_center','id')->select('id','center_name as name');
      }

}
