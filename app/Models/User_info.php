<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;
    protected $table = 'user_infos';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at','user_phone','user_address','delivery_type','pay_type','order_id'];
}
