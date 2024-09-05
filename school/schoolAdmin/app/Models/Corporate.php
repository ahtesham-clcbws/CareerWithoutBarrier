<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;

    protected $table='corporates';
    // protected $fillable = [
    //     'name',
    //     'institute_name',
    //     'type_institution',
    //     'interested_for',
    //     'established_year',
    //     'email',
    //     'phone',
    //     'otp',
    //     'address',
    //     'city',
    //     'pincode',
    //     'attachment',
    // ];
}
