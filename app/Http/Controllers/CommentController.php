<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except( 'show');
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $data = request() -> validate ([
            'comment' => 'required | max:128' ,
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->comment = $data['comment'];
        $comment->save();


        return redirect(route('article.show',$post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post , Comment $comment)
    {
        return view('posts.show' , compact('comment' , 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $comment = Comment::findOrFail($id);
        if (auth()->user()->id !== $comment->user_id){
            return abort(403);
        }


        return view('comments.edit' , compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = request() -> validate ([
            'comment' => 'required | max:128' ,
        ]);
        $comment = Comment::findOrFail($request->id);
        $comment->comment = request('comment');
        $comment->save();
        $post = Post::findOrFail($comment->post_id);
        return redirect(route('article.show'  , compact('post')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post_id;
        $post= Post::findOrFail($post_id);
        $comment->delete();
        return redirect(route('article.show'  , compact('post')));

    }
}
