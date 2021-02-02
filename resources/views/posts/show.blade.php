@extends('layouts.app')

@section('content')
    @method('PUT')
    <div class="container">
        <div class="card">
            <div class="card-header"> {{$post->title}} ⋮ <a href="{{route('article.edit',$post)}}">edit</a></div>
            <div class="card-body">
                <p>{{$post->article}}</p>
            </div>
        </div>
        <div class="mt-4 ml-lg-4 ">
            <h4>comment</h4>
            <textarea class="d-flex" name="comment" id="comment" cols="100" rows="2"> Type a comment ... </textarea>
            <button class="btn-primary mt-1 pull-right"> Add comment</button>
        </div>
        <div class="card mt-5 ml-3">
            <div class="card-header">username ⋮ <a href="{{route('article.edit',$post)}}">edit</a> ⋮ Created at</div>
            <div class="card-body">
                <p>this is comment</p>
            </div>
            <div>

            </div>
        </div>
@endsection
