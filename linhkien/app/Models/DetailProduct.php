<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;
    protected $table = 'details'; //ghi đè lại bảng
    protected $primaryKey = 'ID_product'; // ghi đè lại id của table
}
