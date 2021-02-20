@extends('layouts.app')
@section('content')

<div class="content">
    <div class="text-center font-weight-bold">
        <h1 class="animated bounce infinite "> Art!cles ❤ </h1>
        <p class="text-secondary"> Public TimeLine</p>
    </div>
    @foreach($posts as $post)
        <div class="col-md-8 pt-5 m-auto">
            <div class="font-weight-bold align-content-md-center">
        <div class="card">
            <div class="card-header">  <a href="{{route('profile.show', $post->user->id)}}"> {{$post->user->username}}</a>
                <p class="d-inline-block font-weight-lighter text-secondary pull-right"> {{$post->created_at}}</p>
{{--                <a class="btn-success badge-success btn-sm d-inline pull-right" href="{{ route('article.edit' ,$post)}}">⋮--}}
{{--                    edit</a>--}}
                <p class="font-weight-bold d-inline-block text-secondary" style="color: #5a6268"> ⋮   {{$post->title}} </p>
            </div>
            <div class="card-body">

                {{$post->article}}
                <div class="show-article text-md-right">
                    <a href="{{route('article.show',$post)}}"> show article </a>
                </div>
            </div>
        </div> <br>
            </div>
        </div>

    @endforeach

    <div class="d-flex ">
        <div class="m-auto">
            {{ $posts->links() }}

        </div>
    </div>

</div>
@endsection
