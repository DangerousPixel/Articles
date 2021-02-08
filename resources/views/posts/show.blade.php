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
            <form action="{{ route('comment.store') , $comment }}" enctype="multipart/form-data" method="post">
                @csrf
                <h4>comment</h4>
                <textarea class="d-flex" name="comment" id="comment" cols="100" rows="2"> Type a comment ... </textarea>
                <button class="btn-primary mt-1 pull-right"> Add comment</button>
            </form>
        </div>

        <div class="card mt-5 ml-3">
            @foreach($user->comments as $comment)
                <div class="card-header"> {{$user->username}} ⋮ <a href="">edit</a> ⋮ Created at</div>
                <div class="card-body">
                    <p>{{$comment->comment}}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
