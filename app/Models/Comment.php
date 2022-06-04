<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'body',
        'commentable_id',
        'commentable_type'
    ];
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable')->where('state_id', 1);
    }
    public function userliked()
    {
        if (Auth::check()) {
            $model = Like::where('likeable_id', $this->id)->where('likeable_type', get_class($this))->where('user_id', Auth::user()->id)->first();
            if (!empty($model)) {
                if ($model->state_id == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    public function likedPost()
    {
        if (Auth::check()) {
            return Like::where("likeable_id", $this->id)->where('likeable_type', get_class($this))->where('user_id', Auth::user()->id)->where('state_id', 1)->count();
        }
        return 0;
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'DESC')->with('user');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
