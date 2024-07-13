<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'social_media';
    protected $fillable = [
        'id',
        'name',
        'url',
        'created_at',
        'updated_at',
    ];

}
