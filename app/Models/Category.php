<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'id',
        'category_name',
        'status',
        'upload_icon',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

}