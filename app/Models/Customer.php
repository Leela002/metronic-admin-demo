<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $fillable = [
        'emp_id',
        'first_name',
        'last_name',
        'contact',
        'email',
        'per_address',
        'gender',
        'blood_group',
        'dob',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
