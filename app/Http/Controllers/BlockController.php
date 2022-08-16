<?php

namespace App\Http\Controllers;

use App\Models\GenericModel;
use App\Models\Block;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BlockController extends Controller
{
	function __construct()
    {
        $this->Generic_model = new GenericModel;
        $this->Block = new Block;
    }
	public function index(Request $request)
    {
        $blocker_id = Auth::user()->id;
        if ($blocker_id)
        {
        	$user_id = $request->block_id;
	        $blockers = Block::where(array('user_id'=>$request->block_id,'blocker_id'=>$blocker_id))->delete();
	        if (!empty($blockers)) 
	        {
	        	//$totalFollowers = shortNumber(Follower::where('user_id', $user_id)->count());

				//$followersListhtml = view('services.followers', $data)->render();
				//$followingListhtml = view('services.following', $data)->render();

				$data=[
				    'status'=>'1',
				    'msg'=>'Un-block',
				    //'totalFollowers'=> $totalFollowers,
				    //'totalfollowing'=> $totalfollowing,
				    //'followersListhtml' => $followersListhtml,
				    //'followingListhtml' => $followingListhtml,

				];

				

				return response()->json($data);
	        } 
	        else 
	        {
	        	$block = new Block();
	        	$block->user_id = $request->block_id;
	        	$block->blocker_id = $blocker_id;
	        	$block->save();

	        	//$totalFollowers = shortNumber(Follower::where('user_id', $user_id)->count());
				
				//$followersListhtml = view('services.followers', $data)->render();
				//$followingListhtml = view('services.following', $data)->render();

		        return Response()->json([
	                "status" => '1',
	                'msg'=>'Blocked',
	                
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