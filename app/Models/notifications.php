<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    public $fillable = ['client_id', 'admin_id', 'status', 'subject', 'dateTime'];
}
