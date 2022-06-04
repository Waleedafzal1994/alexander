<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;

    public function disputer() {
        return $this->belongsTo(User::class,'disputer_id')->select('id','name');
    }
    public function order() {
        return $this->belongsTo(Order::class,'order_id')->select('id','price','buyer_id','seller_id','created_at','service_id');
    }
    public function replies() {
        return $this->hasMany(DisputeReply::class);
    }

  
}
