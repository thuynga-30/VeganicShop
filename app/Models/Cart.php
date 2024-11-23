<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'status',
    ];
    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //user
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
        }
}
