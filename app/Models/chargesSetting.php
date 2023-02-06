<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chargesSetting extends Model
{
    use HasFactory;
    public $fillable = ['point_deduction', 'rank_settting', 'point_to_cash'];
  
}
