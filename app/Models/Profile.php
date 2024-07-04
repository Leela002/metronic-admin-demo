<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'emp_profile';
    protected $fillable = [
        'id',
        'name',
        'father_name',
        'mother_name',
        'cur_address',
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
