<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    public function messages() {
        return $this->hasMany(Message::class,'conversation_id');
    }
    public function userOne() {
        return $this->belongsTo(User::class,'user_one')->select(['id','profile_picture','name']);
    }
    public function userTwo() {
        return $this->belongsTo(User::class,'user_two')->select(['id','profile_picture','name']);
    }
}
