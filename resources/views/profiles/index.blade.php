@extends('layouts.app')

@section('content')
    @method('PUT')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-secondary text-center">   {{$user->name}}'s Profile </h3>
                <div class="card">
                    <div class="card-header">
                        <div style="font-weight: bold"> {{ $user->username }} ⋮ have {{$user->posts->count()}} posts
                            <div class="a">
                                @auth
                                    @if( auth()->user()->id == $user->profile->id )
                                    <a href="{{route('profile.edit',$user)}}"> edit profile</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p> {{$user->profile->bio ?? null}}  </p>
                    </div>
                </div>
                <div class=" pull-right font-weight-bold"> @auth
                        <a class=" mt-1 mr-3 badge badge-dark" href="{{route('article.create')}}">
                            Post New Article </a>
                    @endauth
                </div>
                <div class=" pull-left font-weight-bold align-content-md-center ">
                    <a class="mt-1 ml-3 badge badge-dark" href="{{route('home.timeline')}}">Public Timeline</a>

                </div>
            </div>

            <div class="col-md-8 pt-5">
                @foreach($user->posts as $post)
                    <div class="card font-weight-bold">
                        <div class="card-header"><a href="{{route('profile.show',$user)}}">{{$user->username}}</a>
                            @auth
                                @if( auth()->user()->id== $post->user_id)
                                <a class="btn-success badge-success btn-sm d-inline-block pull-right"
                                   href="{{route('article.edit' ,$post)}}">⋮ edit</a>
                                @endif
                            @endauth
                            <p class="d-inline-block" style="color: #5a6268"> ⋮ {{$post->title}} </p>

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
