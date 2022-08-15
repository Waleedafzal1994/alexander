<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;
use Session;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;
    protected $appends = ['post_count'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'real_name',
        'password',
        'tnc',
        'profile_thumbnail',
        'profile_complete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'last_seen',
        // your other new column
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getPosts()
    {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
    public function imagesAsArray()
    {
        return $this->hasMany(Image::class)->where('type_id', 1)->latest();
    }
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'user_id', 'id');
    }

    public function getAge()
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function getProfilePicture()
    {
        if (!empty($this->profile_picture)) {
            return $this->profile_picture;
        } else {
            return "/imgs/avatar.svg";
        }
    }
    public function getImageThumbnail()
    {
        if (!empty($this->profile_thumbnail)) {
            return $this->profile_thumbnail;
        } else {
            return "/imgs/avatar.svg";
        }
    }

    public function getProfileCompleteAttribute() 
    {
        return Session::get('profile_complete', null);
    }

    public function setProfileCompleteAttribute($value)
    {
        Session::put('profile_complete', $value);
    }

    public function getPostCountAttribute()
    {
        return $this->attributes['post_count'] = $this->posts->count();
    }
}
