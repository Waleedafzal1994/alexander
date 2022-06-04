<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;


    protected $fillable = [
        'service_id',
        'order_id',
        'rating',
        'user_id',
        'anonymous',
        'anonymous_name',
        'review',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
