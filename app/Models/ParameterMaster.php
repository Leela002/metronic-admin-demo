<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterMaster extends Model
{
    use HasFactory;

    protected $table = 'parameter_master';
    protected $fillable = [
        'id',
        'parameter_name',
        'help_text',
        'slug',
        'type',
        'value',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

}
