<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;


class Registration extends Authenticatable
{
    use Notifiable;

    //protected $guard = 'admin';  // guard define karein

    protected $fillable = [
        'about',
        'profile_for',
        'first_name',
        'last_name',
        'gender',
        'email',
        'mobile',
        'age',
        'dob',
        'height',
        'weight',
        'mother_tongue',
        'marital_status',
        'body_type',
        'complexion',
        'physical_status',
        'eating_habits',
        'drinking_habits',
        'smoking_habits',
        'education',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'password',
        'status',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
    ];

    protected $hidden = ['password', 'remember_token'];
}
