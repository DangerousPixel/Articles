@extends('layouts.app')
@section('content')

<div class="content">
    @foreach($posts as $post)
        <div class="col-md-8 pt-5 m-auto">
            <div class="font-weight-bold align-content-md-center">
        <div class="card">
            <div class="card-header">  <a href="{{route('profile.show', $post->user->id)}}"> {{$post->user->username}}</a>
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
            </div>
        </div>

    @endforeach
</div>
@endsection
