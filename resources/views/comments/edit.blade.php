@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Edit comment </h3>
        <form class="d-inline" action="{{route('comment.update' , $comment->id)}}" enctype="multipart/form-data"
              method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group row">
                <input id="id" name="id" type="hidden"
                       value="{{ $comment->id}}">
            </div>
            {{--  comment field  --}}
            <input id="comment" type="text"
                   class="form-control mb-3 @error ('comment') is-invalid @enderror"
                   name="comment" value="{{ old('comment') ?? $comment->comment}}"
                   required autocomplete="comment" autofocus>
            <button class="btn btn-primary btn-sm ">save changes</button>
        </form>
        <form method="POST" class="d-inline ml-1" action="{{route('comment.destroy',$comment->id)}}">
            {{method_field('DELETE')}}
            {{ @csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                 Delete
            </button>
        </form>
    </div>
@endsection
