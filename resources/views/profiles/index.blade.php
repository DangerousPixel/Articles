@extends('layouts.app')

@section('content')
    @method('PUT')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div> {{$user->username}} ⋮ have {{$user->posts->count()}} posts
                        <div class="a"><a href="{{route('profile.edit',$user)}}"> edit profile</a></div></div>


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p> {{$user->profile->bio ?? 'N/A'}}  </p>
                </div>
            </div>
            <div class="d-flex justify-content-end"> <a href="{{route('article.create')}}"> Post New Article </a> </div>
        </div>
            <div class="col-md-8 pt-5">
                @foreach($user->posts as $post)
                <div class="card">
                    <div class="card-header">{{$post->title}} ⋮ <a href="{{route('article.edit' ,$post)}}">edit</a></div>
                    <div class="card-body">
                        <p>{{$post->article}}</p>
                        <div class="show-article text-md-right">
                         <a href="{{route('article.show',$post)}}"> show article </a>
                        </div>
                    </div>
                </div> <br>
                @endforeach
            </div>
@endsection
