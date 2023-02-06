<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class winning extends Model
{
    use HasFactory;
    public $fillable = ['user_id','first_name', 'lastname', 'email', 'street_address', 'city','pin_code' ,'country', 'contact','product_id' ,'product_name' ,'product_points','bankname','cash_amount','submission_type','bankdetail_id','account_no'];
}
