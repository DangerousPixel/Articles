@extends('layouts.app')
@section('content')


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
</div>
@endif


<div class="content">
    @foreach($posts as $post)
        <div class="card">
            <div class="card-header">  <a href="{{route('profile.show', $post->user->id)}}"> {{$post->user->username}}
                <a class="btn-success badge-success btn-sm d-inline pull-right" href="{{ route('article.edit' ,$post)}}">⋮
                    edit</a><br>
                <h6 style="color: #5a6268"> Title: {{$post->title}} </h6>

            </div>
            <div class="card-body font-weight-bold">

                <p>{{$post->article}}</p>
                <div class="show-article text-md-right">
                    <a href="{{route('article.show',$post)}}"> show article </a>
                </div>
            </div>
        </div> <br>
    @endforeach
</div>
@endsection
