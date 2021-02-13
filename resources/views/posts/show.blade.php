@extends('layouts.app')
@section('content')
    @method('PUT')

    <div class="container">
        <div class="card">
            <div class="card-header"> Author:    <a href="{{route('profile.show',$post->user->id)}}">{{$post->user->username}}</a>
                ⋮ {{$post->title}} ⋮ <a href="{{route('article.edit',$post)}}">edit</a>
                ⋮ Created at {{$post->created_at}}</div>
            <div class="card-body">
                <p>{{$post->article}}</p>
            </div>
        </div>

        <div class="mt-4 ml-lg-4 ">
            <form action="{{route('comment.store',$post->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <h4>comment</h4>
                <textarea class="d-flex" name="comment" id="comment" cols="100" rows="2"
                          placeholder=" Type a comment ..."> </textarea>
                <input type="submit" class="btn btn-primary btn-sm mt-1 " value="Add comment"><br>
            </form>
        </div>


        @foreach($post->comments as $comment)
            <div class="card ml-3 mt-3">
                <div class="card-header"><a href="{{route('profile.show',$comment->user->id)}}"> {{$comment->user->username}}</a>
                    ⋮ <a href=" {{ route('comment.edit',['id'=>$comment->id] ) }} ">edit</a>
                    ⋮ Created at {{$comment->created_at}}
                    <form method="POST"  class=" d-inline" action="{{route('comment.destroy',$comment->id)}}">
                        {{method_field('DELETE')}}
                        {{ @csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm pull-right" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>

                    </form>
                    {{--                    ⋮ <a class="btn btn-danger" href="{{route('comment.destroy',$comment->id)}}" role="button">Delete</a>--}}

                </div>
                <div class="card-body">
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
        @endforeach

    </div>

@endsection
