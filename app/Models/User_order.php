<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_order extends Model
{
    use HasFactory;
    protected $table = 'user_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at','product_id','product_price','product_qty','user_id','order_subtotal','isCart','user_info_id'];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

}
