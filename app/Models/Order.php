<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends =['totalPrice'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'status'
        ];
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
        }
    public function details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function getTotalPriceAttribute(){ 
        $t =0;
        foreach($this->details as $item){
            $t += $item->price;
        }
        return $t;
    }
    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
