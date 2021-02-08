@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('comment.update' , $comment)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Edit comment </h1>
                    </div>

                    {{--  comment field  --}}

                    <input id="comment" type="text"
                           class="form-control @error ('comment') is-invalid @enderror"
                           name="comment" value="{{ old('comment') ?? $user->comment->comment}}"
                           required autocomplete="comment" autofocus>
                    <div class="row pt-4">
                        <button class="btn btn-primary">save changes</button>

                    </div>
                </div>
            </div>
        </form>
        <form method="POST" action="{{route('article.show' , $post)}}">
            {{method_field('DELETE')}}
            {{ @csrf_field() }}
            <div class="field mt-2">
                <div class="control offset-2 align-content-center">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">☠ Delete comment
                        ☠
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
