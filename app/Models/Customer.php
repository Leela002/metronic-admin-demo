<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

 protected $table = 'customer';
    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'email',
        'gender',
        'blood_group',
        'dob',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
