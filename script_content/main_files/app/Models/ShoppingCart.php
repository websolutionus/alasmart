<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(User::class, 'author_id')->select('id', 'name', 'user_name');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->with('catlangfrontend');
    }

    public function variant(){
        return $this->belongsTo(ProductVariant::class, 'variant_id')->select('id','product_id','variant_name','price');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id')->with('productlangfrontend');
    }





}

