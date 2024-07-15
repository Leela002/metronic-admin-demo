<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'upload_master';
    protected $fillable = [
        'id',
        'name',
        'size',
        'type',
        'path',
        'created_at',
        'updated_at',
    ];

}
