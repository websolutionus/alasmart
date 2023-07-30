<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function seller(){
        return $this->belongsTo(User::class,'seller_id');
    }

    public function customer(){
        return $this->belongsTo(User::class,'customer_id');
    }


}
