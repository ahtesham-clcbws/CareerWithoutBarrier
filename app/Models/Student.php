<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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


    public function latestStudentCode()
    {
        return $this->hasOne(StudentCode::class, 'stud_id')
            // ->select('id', 'stud_id', 'application_code', 'roll_no')
            ->latestOfMany('created_at');
    }

    public function getPercentageAttribute()
    {
        return $this->latestStudentCode?->percentage;
    }

    public function studentClaimForm()
    {
        return $this->hasOne(StudentClaimForm::class, 'student_id');
    }

    public function studentPayment()
    {
        return $this->hasMany(StudentPayment::class, 'student_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id')->select('id', 'name');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->select('id', 'state_id', 'name');
    }
    public function choiceCenterA()
    {
        return $this->belongsTo(District::class, 'test_center_a', 'id')->select('id', 'name');
    }
    public function choiceCenterB()
    {
        return $this->belongsTo(District::class, 'test_center_b', 'id')->select('id', 'name');
    }

    public function qualifications()
    {
        return $this->belongsTo(BoardAgencyStateModel::class, 'qualification', 'id');
    }

    public function scholarShipCategory()
    {
        return $this->belongsTo(EducationType::class, 'scholarship_category', 'id');
    }

    public function scholarShipOptedFor()
    {
        return $this->belongsTo(Gn_OtherExamClassDetailModel::class, 'scholarship_opted_for', 'id');
    }

    public function testimonial()
    {
        return $this->hasOne(TestimonialsModel::class, 'type_id')
            ->where('type', 'student');
    }

    public function studentPaperDetails()
    {
        return $this->hasMany(StudentPaperExported::class, 'student_id');
    }


    // ahtesham
    public function scholarship_granted()
    {
        return $this->belongsTo(ScholarshipClaimGeneration::class);
    }
    public function studentPaperExported()
    {
        return $this->hasMany(StudentPaperExported::class, 'student_id');
    }
}
