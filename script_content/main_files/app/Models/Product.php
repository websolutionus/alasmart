<?php

namespace App\Models;

use Session;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['totalSold','averageRating','totalRating','totalComment'];

    public function getTotalSoldAttribute()
    {
        return $this->sold_items();
    }

    public function getAverageRatingAttribute()
    {
        return $this->average_rating();
    }

    public function getTotalRatingAttribute()
    {
        return $this->total_rating();
    }

    public function getTotalCommentAttribute()
    {
        return $this->total_comment();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id')->with('catlangfrontend');
    }

    public function author(){
        return $this->belongsTo(User::class,'author_id')->select('id','name','user_name','email','phone','image','provider','provider_avatar','created_at','user_name');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function sold_items(){
        return $this->hasMany(OrderItem::class)->count();
    }

    public function average_rating(){
        return $this->hasMany(Review::class)->where('status', 1)->average('rating');
    }

    public function total_rating(){
        return $this->hasMany(Review::class)->where('status', 1)->count();
    }

    public function total_comment(){
        return $this->hasMany(ProductComment::class)->where('status', 1)->count();
    }

    public function productlangfrontend()
    {
        $front_lang = Session::get('front_lang');
        $language = Language::where('is_default', 'Yes')->first();
        if($front_lang == ''){
            $front_lang = Session::put('front_lang', $language->lang_code);
        }
        return $this->belongsTo(ProductLanguage::class, 'id', 'product_id')->where('lang_code', $front_lang);
    }

    public function productlangadmin()
    {
        $admin_lang = Session::get('admin_lang');
        return $this->belongsTo(ProductLanguage::class, 'id', 'product_id')->where('lang_code', $admin_lang);
    }
}
