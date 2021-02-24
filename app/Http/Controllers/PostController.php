<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index' , 'show');
    }
    public function index()
    {

        $posts = Post::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('welcome', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        $user = Auth::user() ?? abort(403);
        return view('posts.create' , compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user)
    {

        $data = request()->validate([
            'title' => 'required',
            'article' => 'required',
            'tags.*' => 'nullable|integer',

        ]);


        $post = new Post();
        $post->title = $data['title'];
        $post->article = $data['article'];
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tags()->attach(request('tags'));


        return redirect('/profile/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id !== $post->user_id){
        return abort(403);
        }
        return view('posts.edit', compact('post'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'article' => 'required',
        ]);
        $post->title = request('title');
        $post->article = request('article');
        $post->save();
        return redirect(route('article.show', compact('post')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
//        if (auth()->user()->id !== $post->user_id){
//            return abort(403);
//        }
        Post::find($post)->delete();
        $id = auth()->user()->id;
        return redirect()->route('profile.show', $id);
    }
}
