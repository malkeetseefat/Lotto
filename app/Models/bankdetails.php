<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankdetails extends Model
{
    use HasFactory;
    public $fillable = ['user_id','bankname', 'account_no', 'firstname', 'lastname', 'branchcode','accounttype' ,'streetaddress' ,'city' ,'zipcode' ,'country','panno','aadharno','contact','emailaddress'];
}
