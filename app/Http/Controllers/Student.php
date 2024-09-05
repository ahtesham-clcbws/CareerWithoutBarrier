<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function studentCode()
    {
        return $this->hasMany(StudentCode::class, 'stud_id');
    }

    public function studentPayment()
    {
        return $this->hasMany(StudentPayment::class, 'student_id');
    }
    public function state()
    {
      return $this->belongsTo(District::class, 'district_id', 'id')->select('id','state_id','name');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->select('id','state_id','name');
    }
    public function choiceCenterA()
    {
        return $this->belongsTo(District::class, 'test_center_a', 'id')->select('id','state_id','name');
    }
    public function choiceCenterB()
    {
        return $this->belongsTo(District::class, 'test_center_b', 'id')->select('id','state_id','name');
    }
    
    public function qualifications()
    {
        return $this->belongsTo(BoardAgencyStateModel::class, 'qualification', 'id');
    }

    public function scholarShipCategory()
    {
        return $this->belongsTo(Educationtype::class, 'scholarship_category', 'id');
    }

    public function scholarShipOptedFor()
    {
        return $this->belongsTo(Gn_OtherExamClassDetailModel::class, 'scholarship_opted_for', 'id');
    }
}
