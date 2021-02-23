<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index (Tag $tag)
    {
        $posts = $tag->posts() ->orderBy('created_at', 'DESC')->paginate(10);
        return view('welcome' , compact('posts'));
    }
}
