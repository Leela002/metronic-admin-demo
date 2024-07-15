<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use HasFactory;

    protected $table = 'push_notification';
    protected $fillable = [
        'id',
        'firebase_cloud_messaging_key',
        'firebase_api_key',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

}
