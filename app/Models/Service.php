<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $appends = ['average_rate', 'post_count', 'ratings_count'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id')->latest();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'service_id')->orderBy("id", "DESC");
    }

    public function category_type()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getAverageRateAttribute()
    {
        return $this->attributes['average_rate'] = $this->ratings->avg('rating');
    }
    public function getPostCountAttribute()
    {
        return $this->attributes['post_count'] = $this->posts->count();
    }
    public function getRatingsCountAttribute()
    {
        return $this->attributes['ratings_count'] = $this->ratings->count();
    }
}
