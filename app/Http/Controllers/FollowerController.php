<?php

namespace App\Http\Controllers;

use App\Models\GenericModel;
use App\Models\Follower;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FollowerController extends Controller
{
	function __construct()
    {
        $this->Generic_model = new GenericModel;
        $this->Follower = new Follower;
    }
	public function index(Request $request)
    {
        $follower_id = Auth::user()->id;
        if ($follower_id)
        {
        	$user_id = $request->following_id;
	        $followers = Follower::where(array('user_id'=>$request->following_id,'follower_id'=>$follower_id))->delete();
	        if (!empty($followers)) 
	        {
	        	$totalFollowers = shortNumber(Follower::where('user_id', $user_id)->count());
				$totalfollowing = shortNumber(Follower::where('follower_id', $user_id)->count());
				$data['followersList'] = $this->Follower->getAllFollowers($user_id);
				// echo $user_id;
				// print_r($data);die;
				$data['followingList'] = $this->Follower->getAllFollowing($user_id);

				$followersListhtml = view('services.followers', $data)->render();
				$followingListhtml = view('services.following', $data)->render();

				$data=[
				    'status'=>'1',
				    'msg'=>'Follow',
				    'totalFollowers'=> $totalFollowers,
				    'totalfollowing'=> $totalfollowing,
				    'followersListhtml' => $followersListhtml,
				    'followingListhtml' => $followingListhtml,

				];

				

				return response()->json($data);
	        } 
	        else 
	        {
	        	$follow = new Follower();
	        	$follow->user_id = $request->following_id;
	        	$follow->follower_id = $follower_id;
	        	$follow->save();

	        	$totalFollowers = shortNumber(Follower::where('user_id', $user_id)->count());
				$totalfollowing = shortNumber(Follower::where('follower_id', $user_id)->count());
				$data['followersList'] = $this->Follower->getAllFollowers($user_id);
				$data['followingList'] = $this->Follower->getAllFollowing($user_id);

				$followersListhtml = view('services.followers', $data)->render();
				$followingListhtml = view('services.following', $data)->render();

		        return Response()->json([
	                "status" => '1',
	                'msg'=>'Following',
	                'totalFollowers'=> $totalFollowers,
	                'totalfollowing'=> $totalfollowing,
	                'followersListhtml' => $followersListhtml,
	                'followingListhtml' => $followingListhtml,
	            ]);
	        }
	    }
	    else 
        {
        	return Response()->json([
		                "error" => '1',
		                "msg"=>"Please login first."
		            ]);
        }
    }

    public function loginFollow(Request $request)
    {
        $follower_id = Auth::user()->id;
        if ($follower_id)
        {
        	$user_id = $request->following_id;
	        $followers = Follower::where(array('user_id'=>$request->following_id,'follower_id'=>$follower_id))->delete();
	        if (!empty($followers)) 
	        {
				$data=[
				    'status'=>'1',
				    'msg'=>'Follow',
				];
				return response()->json($data);
	        } 
	        else 
	        {
	        	$follow = new Follower();
	        	$follow->user_id = $request->following_id;
	        	$follow->follower_id = $follower_id;
	        	$follow->save();

		        return Response()->json([
	                "status" => '1',
	                'msg'=>'Following',
	            ]);
	        }
	    }
	    else 
        {
        	return Response()->json([
		                "error" => '1',
		                "msg"=>"Please login first."
		            ]);
        }
    }
}