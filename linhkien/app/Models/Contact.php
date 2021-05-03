<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'feedback'; //ghi đè lại bảng
    protected $primaryKey = 'id'; // ghi đè lại id của table
}
