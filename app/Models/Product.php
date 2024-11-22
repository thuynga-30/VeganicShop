<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'price',
        'origin',
        'quantity',
        'description',
        'basic_des',    
        'category_id',
    ];
    public function cat(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    
}
