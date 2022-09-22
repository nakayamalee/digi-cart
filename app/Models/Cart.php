<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $uid
 * @property integer $pid
 * @property integer $qty
 */
class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'uid', 'pid', 'qty'];

    public function product()
    {
        return $this->hasOne(Product::class,'id','pid');
    }
}
