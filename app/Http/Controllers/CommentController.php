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
    public function store(Comment $comment)
    {
        $data = request() -> validate ([
            'comment' => 'required | max:128' ,
        ]);
        auth()->user()->comment()->create([
            'comment' => $data['comment'],
        ]);

        return redirect('/profile/{post}');
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
    public function edit(Comment $comment)
    {
        return view('comments.edit' , compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $comment = request() -> validate ([
            'comment' => 'required | max:128' ,
        ]);
        $comment->comment = request('comment');
        $comment->save();
        return redirect(route('article.show'  , compact('post')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        Comment::find($comment)->delete();
        $id = $this->post()->id;
        return redirect()->route('article.show',$id);
    }
}
