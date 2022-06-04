<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function postAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $with = ['postAuthor'];

}
