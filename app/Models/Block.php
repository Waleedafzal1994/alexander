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


    public function getAllBlockers($u_id)
    {
        $db = DB::table('blocks');

        $db->select('blocks.*','users.id','users.name','users.profile_picture')
            ->join('users', 'users.id', '=', 'blocks.user_id');
        $db->where('blocks.blocker_id',$u_id);
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