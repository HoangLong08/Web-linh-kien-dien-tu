<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product'; //ghi đè lại bảng
    protected $primaryKey = 'ID_product'; // ghi đè lại id của table
}
