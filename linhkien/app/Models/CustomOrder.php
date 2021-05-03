<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    use HasFactory;
    protected $table = 'customer_order'; //ghi đè lại bảng
    protected $primaryKey = 'id'; // ghi đè lại id của table
}
