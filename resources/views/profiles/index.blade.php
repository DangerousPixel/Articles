@extends('layouts.app')

@section('content')
    @method('PUT')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div style="font-weight: bold"> {{ $user->username }} ⋮ have {{$user->posts->count()}} posts
                            <div class="a"><a href="{{route('profile.edit',$user)}}"> edit profile</a></div>
                        </div>
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
                <div class=" pull-right font-weight-bold"><a href="{{route('article.create')}}"> Post New Article </a>
                </div>
            </div>

            <div class="col-md-8 pt-5">
                <div class="font-weight-bold align-content-md-center">
                    <a href="{{route('home.timeline')}}">Public Timeline</a>
                </div>

                @foreach($user->posts as $post)
                    <div class="card">
                        <div class="card-header"><a href="{{route('profile.show',$user)}}">{{$user->username}}</a>
                            <a class="btn-success badge-success btn-sm d-inline pull-right"
                               href="{{route('article.edit' ,$post)}}">⋮ edit</a><br>
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
