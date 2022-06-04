<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;


class Follower extends BaseModel
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'follower_id'
    ];

    public function getAllFollowers($u_id)
    {
        $db = DB::table('followers');

        $db->select('followers.*','users.id','users.name','users.profile_picture')
            ->join('users', 'users.id', '=', 'followers.follower_id');
        $db->where('followers.user_id',$u_id);
        $query = $db->get();
        if ($query->isNotEmpty())
        {
            $res = $query;
            return $res;
        }
        else
        {
            return FALSE;
        }
    }

    public function getAllFollowing($u_id)
    {
        $db = DB::table('followers');

        $db->select('followers.*','users.id','users.name','users.profile_picture')
            ->join('users', 'users.id', '=', 'followers.user_id');
        $db->where('followers.follower_id',$u_id);
        $query = $db->get();
        if ($query->isNotEmpty())
        {
            $res = $query;
            return $res;
        }
        else
        {
            return FALSE;
        }
    }
}