<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;
    protected $table = 'user_infos';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at','user_id','user_address','delivery_type','delivery_bill','pay_type','order_subtotal','order_id','isCart','status'];

    public function user_order()
    {
        return $this->hasMany(User_order::class,'user_info_id','id');
    }
}
