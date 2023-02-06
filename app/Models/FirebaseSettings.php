<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirebaseSettings extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'apiKey', 'authDomain', 'projectId', 'storageBucket', 'messagingSenderId', 'appId', 'measurementId', 'twillo_sid', 'twillo_token', 'twillo_messagingServiceSid'];
}
