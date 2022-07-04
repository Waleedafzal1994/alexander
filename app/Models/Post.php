<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;

class Post extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'content',
        'service_id',
        'state_id',
        'user_id',
        'created_at',
        'type_id'
    ];

    protected $appends = [
        'comments_count',
        'likes_count',
        'formatted_created_at'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->where('type_id', 1);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable')->where('state_id', 1);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->with('likes');
    }
    public function userliked()
    {
        if (Auth::check()) {
            $model = Like::where('likeable_id', $this->id)
                ->where('likeable_type', get_class($this))
                ->where('user_id', Auth::user()->id)->first();
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
            return Like::where("likeable_id", $this->id)->where("likeable_type", Like::class)
                ->where('user_id', Auth::user()->id)
                ->where('state_id', 1)->count();
        }
        return 0;
    }
    public function postLikedUserNames()
    {
        $content = "";
        $names = "";
        $currentUser = "";
        $userLikes = $this->likes;
        $userLikesCount = $userLikes->count();
        $totalCount = $userLikesCount;
        $recordLimit = 3;
        // 1st case
        if (Auth::check()) {
            $user = Auth::user()->id;
            if ($this->userliked()) {
                $currentUser = "<span><strong>You</strong>";
                $userLikesLimited = $this->likes->where('user_id', '!=', $user)->take(2);
                $totalCount--;
            } else {
                $userLikesLimited = $this->likes->take($recordLimit);
            }
        } else {
            $userLikesLimited = $this->likes->take($recordLimit);
        }

        if ($userLikesCount > 0) {
            foreach ($userLikes as $key => $value) {
                $content .= '<a data-toggle="tooltip" title="' . $value->user->name . '" href="#" data-original-title="' . $value->user->name . '"><img alt="' . $value->user->name . '" src="' . $value->user->getImageThumbnail() . '"></a>';
            }
            foreach ($userLikesLimited as $key => $value) {
                $totalCount--;
                if (!empty($currentUser)) {
                    $names .= ",<b>" . $value->user->name . "</b>";
                } else {
                    if ($key == 0) {
                        $names .= "<span><strong>" . $value->user->name . "</strong>";
                    } else {
                        $names .= ",<b>" . $value->user->name . "</b>";
                    }
                }
            }
        }
        if (!empty($totalCount) && $totalCount > 0) {
            $names .= ' and <a href="#" title="">' . $totalCount . ' more</a>';
        }
        if (!empty($names)) {
            $names .= ' liked.</span>';
        }
        if (!empty($currentUser)) {
            if (!empty($names)) {
                $names = $currentUser . $names;
            } else {
                $names = $currentUser . ' liked.</span>';
            }
        }

        return $content . $names;
    }


    public function commentByUsers($offset = 0, $take='')
    {
        if(empty($take)){
            $take = 3; 
        }
        $content = "";
        $comments = $this->comments->skip($offset)->take($take);
        if (!empty($comments) && ($comments->count() > 0)) {
            foreach ($comments as $key => $value) {
                $content .= self::commentHtml($value, $this);
            }
        }
        return $content;
    }

    public static function commentHtml($value, $post)
    {
        $content = "";
        $content .= "<li class='comment-section_" . $post->id . "'>";
        
        // $content = "";
        $content .= '<div class="shadow bg-gradient br-10 p-3 mb-4">';
        $content .= '<div class="d-flex">';
        $content .= '<div class="comet-avatar"><img src="' . $value->user->getProfilePicture() . '" alt=""></div>';
        $content .= '<div class="we-comment pb-0 pl-3">';
        $content .= '<div class="d-flex align-items-center mt-3">';
        $content .= '<h5 class="review-profile-heading mb-0"><a href="time-line.html" title="">' . $value->user->name . '</a></h5>';
        $content .= '<span>' . Carbon::parse($value->created_at)->format('F d, Y') . '</span>';
        $content .= '</div>';
        $content .= '<div class="inline-itms comment-action-box">';
        $content .= '<p class="text-black my-3">' . $value->body . '</p>';
        $content .= '<span class="comment-reaction likes heart';
        if ($value->userliked()) {
            $content .= ' active-heart';
        }
        $content .= '" data-comment-post-id="' . $value->id . '" data-comment-reaction-id="' . shortNumber($value->likedPost()) . '">';
        $content .= ' <i class="fa fa-heart"></i>';
        $content .= ' <span id="liked_comment_count_' . $value->id . '"> ' . shortNumber($value->likes_count) . '</span>';
        $content .= '</span>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';

        $content .= '</div>';
        $content .= "</li>";
        return $content;
    }

    public function imageContentHtml()
    {
        return $images = $this->images;
        // echo "<pre>";
        //  print_r($images);
        // die();
        $count = $images->count();

        $content = "";
        if (!empty($images)) {
            $content .=  '<div id="fullsizeimg" style="position: relative;" class="lightbox lightbox-user-gallery">';
            $content .=  '<div class="row wo_adaptive_media mx-0 px-3">';
            foreach ($images as $value) {
                $content .= '<div class="album-image ' . $this->selectClassImage($count) . '">';
                $content .= '<img src="' . $value->file_name . '" alt="' . $value->name . '" class="image-file pointer">';
                $content .= '</div>';
                $content .= '<div class="clear"></div>';
            }
            $content .=  '</div>';
            $content .=  '</div>';
        }
        return $content;
    }
    
    // public function imageContentHtml()
    // {
    //     $images = $this->images;
    //     $count = $images->count();
    //     $content = "";
    //     if (!empty($images)) {
    //         $content .=  '<div id="fullsizeimg" style="position: relative;" class="lightbox lightbox-user-gallery">';
    //         $content .=  '<div class="row wo_adaptive_media mx-0 px-3">';
    //         foreach ($images as $value) {
    //             $content .= '<div class="album-image ' . $this->selectClassImage($count) . '">';
    //             $content .= '<img src="' . $value->file_name . '" alt="' . $value->name . '" class="image-file pointer">';
    //             $content .= '</div>';
    //             $content .= '<div class="clear"></div>';
    //         }
    //         $content .=  '</div>';
    //         $content .=  '</div>';
    //     }
    //     return $content;
    // }

    public function selectClassImage($count)
    {
        $class = "";
        switch ($count) {
            case '1':
                $class = "width-1 col-12";
                break;
            case '2':
                $class = "width-2";
                break;
            case '3':
                $class = "width-3";
                break;
            case '4':
                $class = "width-4";
                break;
            default:
                $class = "";
                break;
        }
        return $class;
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type_id', 1);
    }

    public function postAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $with = ['postAuthor'];

    public function getLikesCountAttribute()
    {
        return $this->attributes['likes_count'] = $this->number_format_short($this->likes->count());
    }
    public function getCommentsCountAttribute()
    {
        return $this->attributes['comments_count'] = $this->number_format_short($this->comments->count());
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->attributes['formatted_created_at'] = Carbon::parse($this->created_at)->format('F d, Y');
    }

    public function videoContentHtml()
    {
        $str = "";
        $url = '/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i';
        preg_match_all($url, $this->attributes['content'], $matches);
        $uniqueArray = array_unique($matches[1]);
        if (!empty($uniqueArray)) {
            foreach ($uniqueArray as $value) {
                $str .= '<iframe width="420" height="315" src="https://www.youtube.com/embed/' . $value . '" frameborder="0" allowfullscreen></iframe><br>';
            }
        }
        return $str;
    }

    public function getContentAttribute()
    {
        $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
        return preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>',  $this->attributes['content']);
    }
}
