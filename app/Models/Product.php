<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'user_id', 'ticket_no', 'description' , 'photo', 'price' , 'start_date','end_date','category', 'seller'
    ];
}
