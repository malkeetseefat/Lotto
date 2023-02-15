<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'order_no',
        'last_name',
        'thing_you_want_to_order',
        'DOB',
        'street_address',
        'city',
        'region',
        'pin_code',
        'country',
        'payment_id',
        'amount',
        'contact',
        'status',
        'winning_order_status',
        'photo',
        'subject',
    ];
}
