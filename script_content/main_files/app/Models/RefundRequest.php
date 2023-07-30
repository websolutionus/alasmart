<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(User::class,'client_id')->select('id','name','email','image','phone','address');
    }

    public function order(){
        return $this->belongsTo(Order::class)->select('id','order_id','total_amount');
    }
}
