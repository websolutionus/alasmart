<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'password',
        'provider',
        'provider_id',
        'provider_avatar',
        'status',
        'email_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['totalProduct','totalSale','averageRating', 'totalRating'];

    function getTotalProductAttribute()
    {
        return $this->total_product();
    }

    public function getTotalSaleAttribute()
    {
        return $this->sold_items();
    }

    public function getAverageRatingAttribute()
    {
        return $this->average_rating();
    }

    public function getTotalRatingAttribute()
    {
        return $this->votes();
    }

    public function seller(){
        return $this->hasOne(Vendor::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function total_product(){
        return $this->hasMany(Product::class, 'author_id', 'id')->where('status', 1)->count();
    }

    public function sold_items(){
        return $this->hasMany(OrderItem::class, 'author_id', 'id')->count();
    }

    public function average_rating(){
        return $this->hasMany(Review::class, 'author_id', 'id')->where('status', 1)->average('rating');
    }

    public function votes(){
        return $this->hasMany(Review::class, 'author_id', 'id')->where('status', 1)->count();
    }

}
