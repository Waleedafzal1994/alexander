<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;


class Block extends BaseModel
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'blocker_id'
    ];
}