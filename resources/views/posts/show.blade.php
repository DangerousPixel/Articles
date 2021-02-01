@extends('layouts.app')

@section('content')
    @method('PUT')
    <div class="container">
        <div class="card">
            <div class="card-header"> {{$post->title}}  ⋮ <a href="{{route('article.edit',$post)}}">edit</a></div>
{{--            <div class="card-header"> {{$post->title}} ⋮ <a href="{{route('article.destroy', $id)}}" onclick="return confirm('Are you sure?')">delete</a> ⋮ <a href="">edit</a></div>--}}
            <div class="card-body">
                <p>{{$post->article}}</p>
                <div class="show-article text-md-right">
                </div>
            </div>

    </div>
@endsection
