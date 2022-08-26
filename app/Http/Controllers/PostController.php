<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createPost(Request $request)
    {
        $rules = [
            'content' => [
                'required_without:postPhotos',
                'nullable',
                'string',
                'max:500',
                // 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?([^\s]+)~$/i',
                'regex:/(^|\s)((https?:\/\/)?(?=[^\/\s]*youtube)[\w-]+(\.[a-z-]+)+\.?(:\d+)?(\/\S*)?)/i',
            ],
            'postPhotos.*' => 'required_without:content|mimes:jpeg,jpg,x-png,png,gif',
            'postPhotos' => 'max:4',
            // 'postVideo' => 'mimes:mp4',
            // 'postMusic' => 'mimes:mp3',
        ];
        $messages = array(
            'content.required' => 'Content is required.',
            'content.regex' => "Only youtube links are allowed",
            'postPhotos.max' => 'Only 4 files are allowed.'
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first()
            ];
            return $this->error($error);
            // return redirect()->to(url()->previous() . '#profile')->with($error);
        }

        $status = [];
        DB::beginTransaction();
        try {
            $user = Auth::user()->id;
            $model = new Post();
            $model->content = $request->content;
            $model->service_id = $request->service_id;
            $model->user_id = $user;
            $model->state_id = Constants::STATE_ACTIVE;
            if ($model->save()) {
                if ($request->hasFile('postPhotos')) {
                    foreach ($request->file('postPhotos') as $file) {
                        $uploadedImage = Image::saveImage($file, 'post-media', $model->id);
                        $image = new Image();
                        $image->name = $file->getClientOriginalName();
                        $image->type_id = "1";
                        $image->file_name =  $uploadedImage;
                        $image->extension = $file->getClientOriginalExtension();
                        if ($user) {
                            $image->user()->associate($user);
                        }
                        $model->images()->save($image);
                    }
                }
                // if ($request->hasFile('postVideo')) {
                //     $uploadedVideo = Image::saveImage($request->file('postVideo'), 'post-media', $model->id);
                //     $video = new Image();
                //     $video->name = $request->file('postVideo')->getClientOriginalName();
                //     $video->type_id = "2";
                //     $video->file_name =  $uploadedVideo;
                //     $video->extension = $request->file('postVideo')->getClientOriginalExtension();
                //     if ($user) {
                //         $video->user()->associate($user);
                //     }
                //     $model->images()->save($video);
                // }
                // if ($request->hasFile('postMusic')) {
                //     $uploadedMusic = Image::saveImage($request->file('postMusic'), 'post-media', $model->id);
                //     $music = new Image();
                //     $music->name = $request->file('postMusic')->getClientOriginalName();
                //     $music->type_id = "3";
                //     $music->file_name =  $uploadedMusic;
                //     $music->extension = $request->file('postMusic')->getClientOriginalExtension();
                //     if ($user) {
                //         $music->user()->associate($user);
                //     }
                //     $model->images()->save($music);
                // }
            }
            DB::commit();
            return $this->success(['success' => 'Post is created.']);
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $error = implode(" | ", $exception->errorInfo);
            return $this->error($error);
        } catch (TooManyRequestsHttpException $e) {
            return $this->error($e->message);
        }
        // return redirect()->to(url()->previous() . '#profile')->with($status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function likePost(Request $request)
    {
        $user = Auth::user();
        $msg = null;
        $rules = [
            'id' => 'required',
            'liked' => 'required',
            'type' => 'required'
        ];
        $messages = array(
            'id.required' => 'Something went wrong',
            'liked.required' => 'Something went wrong',
            'type.required' => 'Something went wrong',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first()
            ];
            return $this->error($error);
        }
        DB::beginTransaction();
        try {
            if ($request->type == 'gallery') {
                $model = Image::where("id", $request->id)->first();
            } elseif ($request->type == 'comment') {
                $model = Comment::where("id", $request->id)->first();
            } else {
                $model = Post::where("id", $request->id)->first();
            }
            if (empty($model)) {
                return $this->failed();
            }

            // check if exists if not create
            $likeModel = Like::updateOrCreate(
                [
                    'likeable_id' => $model->id,
                    'likeable_type' => get_class($model),
                    'user_id' => $user->id
                ],
                ['state_id' => $request->liked]
            );
            DB::commit();
            if ($likeModel->state_id == 0) {
                $msg = "unliked!!!";
            } else {
                $msg = "liked!!!";
            }
            $data = [];
            $data = [
                'message' => $msg,
                "liked" => $likeModel->state_id,
                'likes_count' => shortNumber($likeModel->number_format_short($model->likes->count())),
            ];
            if ($request->type == 'post') {
                $data['liked_html'] = $model->postLikedUserNames();
            }
            return $this->success($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $error = implode(" | ", $exception->errorInfo);
            return $this->error($error);
        }
    }

    public function addComment(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'body' => "required|string|max:500",
            'commentable_id' => "required"
        ];
        $messages = array(
            'body.required' => 'Please add content to your comment',
            'commentable_id.required' => 'Something went wrong'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first()
            ];
            return $this->error($error);
        }
        $data = [];
        // try {
        $model = Post::where("id", $request->commentable_id)->first();
        if (empty($model)) {
            return $this->failed();
        }
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $user->id;
        $model->comments()->save($comment);

        return $this->success(
            [
                "data" => Post::commentHtml($comment, $model),
                'count' => shortNumber($model->number_format_short($model->comments->count())),
            ]
        );
        // } catch (\Illuminate\Database\QueryException $exception) {
        //     return $this->error($exception->errorInfo);
        // }
    }

    public function loadMoreComment(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'id' => "required|numeric",
            'page' => "required|numeric"
        ];
        $messages = array(
            'page.required' => 'Something went wrong',
            'id.required' => 'Something went wrong'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first()
            ];
            return $this->error($error);
        }
        $limit = !empty($request->page) ? 5 : 3;
        $model = Post::where('id', $request->id)->first();
        if (!empty($model)) {
            $offset = $request->page * $limit - (!empty($request->page) ? 2 : 0); // as we fetched 3 records initially so -2 added
            $next_offset = ($request->page+1) * $limit - (!empty($request->page) ? 2 : 0 );
            $comment = $model->commentByUsers($offset,$limit);
            $next_page_comments = $model->commentByUsers($next_offset,$limit);
            if (!empty($next_page_comments)) {
                return $this->success([
                    "data" => $comment,
                    "page" => ($request->page + 1),
                    "last_page" => false
                ]);
            } else {
                return $this->success([
                    "data" => $comment,
                    "page" => $request->page,
                    "last_page" => true
                ]);
            }
        }
        return $this->error("Error!!!");
    }

    public function loadMorePosts(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'service' => "required|numeric",
            'page' => "required|numeric"
        ];
        $messages = array(
            'service.required' => 'Something went wrong',
            'page.required' => 'Something went wrong'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first()
            ];
            return $this->error($error);
        }
        $limit = 5;
        $offset = $request->page * $limit;
        //$posts = Post::where('service_id', $request->service)->skip($offset)->take($limit)->latest()->get();
        $posts = Post::where('user_id', $request->service)->skip($offset)->take($limit)->latest()->get();
        // echo $posts->count();
        // die();
        if (!empty($posts) && $posts->count() > 0) {
            $html = view('services.postSection', compact('posts'))->render();
            return $this->success([
                "data" => $html,
                "page" => ($request->page + 1),
                'post_count' => $posts->count(),
                "last_page" => false
            ]);
        } else {
            return $this->success([
                "data" => "",
                "page" => ($request->page + 1),
                "last_page" => true
            ]);
        }
        return $this->error("Error!!!");
    }

    function deletePost(Request $request)
    {
        $user = Auth::user();
        if ($user)
            $rules = [
                'id' => "required|numeric",
                'type' => "required|string"
            ];
        $messages = array(
            'id.required' => 'Invalid Post ID provided!',
            'type.required' => 'Invalid data provided'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        $model = Post::where('id', $request->id)->first();
        if (!empty($model)) {
            if ($model->delete()) {
                return $this->success("Post Deletion successfull");
            }
            return $this->error("Something went wrong");
        } else {
            return $this->error("Post not found.");
        }
    }
    function deleteGallery(Request $request)
    {
        $user = Auth::user();
        if ($user)
            $rules = [
                'id' => "required|numeric",
                'type' => "required|string"
            ];
        $messages = array(
            'id.required' => 'Invalid Post ID provided!',
            'type.required' => 'Invalid data provided'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->error($validator->errors()->first());
        }

        $model = Image::where('id', $request->id)->first();
        if (!empty($model)) {
            if ($model->delete()) {
                return $this->success("Image Deletion successfull");
            }
            return $this->error("Something went wrong");
        } else {
            return $this->error("Image not found.");
        }
    }
}
