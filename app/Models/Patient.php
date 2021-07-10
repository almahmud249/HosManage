<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'confirm_password',
        'gender',
        'address',
        'country',
        'email',
        'phone',
        'date',
        'city',
        'status',
        'postal',
        'email_verified_token',
        'remember_token',
        'email_verified',
        'email_verified_at',
        'patients_id',

    ];
}
