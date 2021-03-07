@extends('layouts.app')
@section('content')
    @method('PUT')

    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <a class="font-weight-bold"
                   href="{{route('profile.show',$post->user->id)}}">{{$post->user->username}}</a>
                ⋮ <p class="d-inline-block font-weight-bold"> {{$post->title}} </p>
                <p class="d-inline-block text-secondary pull-right">{{$post->created_at}}</p></div>
            <div class="card-body">
                <p>{{$post->article}}</p>
                <hr class="mt-2 mb-3"/>
                <div class="d-inline-block">
                    @if (count($post->tags))
                        <p class="d-inline-block font-weight-bold"> Tags:</p>
                        @if(in_array("poems", $postags))
                            <a href="{{route('tags.show' , 'poems')}}" class="badge badge-primary">Poems</a>
                        @endif
                        @if(in_array("sports", $postags))
                            <a href="{{route('tags.show' , 'sports')}}" class="badge badge-secondary">Sports</a>
                        @endif
                        @if(in_array("techs", $postags))
                            <a href="{{route('tags.show' , 'techs')}}" class="badge badge-success">Techs</a>
                        @endif
                        @if(in_array("education", $postags))
                            <a href="{{route('tags.show' , 'education')}}" class="badge badge-danger">Education</a>
                        @endif
                        @if(in_array("economy", $postags))
                            <a href="{{route('tags.show' , 'economy')}}" class="badge badge-warning">Economy</a>
                        @endif
                        @if(in_array("intertainments", $postags))
                            <a href="{{route('tags.show' , 'intertainments')}}"
                               class="badge badge-info">Intertainments</a>
                        @endif
                    @endif

                    {{--                            @foreach ($post->tags as $tag)--}}
                    {{--                            <a href="{{route('tags.show' ,$tag->name)}}"> </a>--}}
                    {{--                           --}}
                    {{--                            ,--}}
                    {{--                        @endforeach--}}


                </div>

                @auth
                    @if( auth()->user()->id==$post->user_id)
                        <a class="btn-success badge-success btn-sm d-inline pull-right"
                           href="{{route('article.edit' ,$post)}}">⋮ edit</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="mt-4 ml-lg-4 ">

            <form action="{{route('comment.store',$post->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @auth

                    <h5> Add comment</h5>
                    <textarea class="d-flex" name="comment" id="comment" cols="130" rows="2"
                              placeholder=" Type a comment ..."> </textarea>
                    <input type="submit" class="btn btn-primary btn-sm mt-1 " value="reply"><br>
                    @if ($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif

                @endauth
            </form>

        </div>


        @foreach($post->comments as $comment)
            <div class="card ml-3 mt-3">
                <div class="card-header">
                    <a class="d-inline-flex font-weight-bold"
                       href="{{route('profile.show',$comment->user->id)}}"> {{$comment->user->username}}</a>
                    {{--                    @auth--}}
                    {{--                    ⋮ <a href=" {{ route('comment.edit',['id'=>$comment->id] ) }} ">edit</a>--}}
                    {{--                    @endauth--}}
                    <p class="d-inline-block font-weight-lighter text-secondary pull-right">{{$comment->created_at}}</p>
                    {{--                    ⋮ <a class="btn btn-danger" href="{{route('comment.destroy',$comment->id)}}" role="button">Delete</a>--}}
                </div>
                <div class="card-body">
                    <p>{{$comment->comment}}</p>
                    @auth
                        @if( auth()->user()->id == $comment->user_id)
                            <a class="ml-1 btn-success badge-success btn-sm d-inline pull-right"
                               href="{{route('comment.edit' ,$comment)}}">⋮ edit</a>
                            {{--                        <form method="POST" class=" d-inline" action="{{route('comment.destroy',$comment->id)}}">--}}
                            {{--                            {{method_field('DELETE')}}--}}
                            {{--                            {{ @csrf_field() }}--}}
                            {{--                            <button type="submit" class="btn btn-danger btn-sm pull-right"--}}
                            {{--                                    onclick="return confirm('Are you sure?')">--}}
                            {{--                                Delete--}}
                            {{--                            </button>--}}
                            {{--                        </form>--}}
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach

    </div>

@endsection
