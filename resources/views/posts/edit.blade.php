@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="d-inline" action="{{ route('article.update' , $post) }}" enctype="multipart/form-data"
              method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <div class="  col-8 offset-2">
                <h1>Edit Art!cle</h1>


                {{--  Title field  --}}
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title </label>
                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{ old('title') ?? $post->title }}"
                           autocomplete="title" autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                {{--  Article Field  --}}
                <div class="form-group row">
                    <label for="article" class=" col-md-4 col-form-label">Article </label>
                    <input id="article"
                           type="text"
                           class=" form-control{{ $errors->has('article') ? ' is-invalid' : '' }} "
                           name="article"
                           value="{{ old('article') ?? $post->article }}"
                           autocomplete="article" autofocus>
                    @if ($errors->has('article'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('article') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <button class="btn btn-primary btn-sm offset-2">save changes</button>

        </form>
        <form method="POST" class="d-inline ml-3 align-content-center" action="{{route('article.show' , $post)}}">
            {{method_field('DELETE')}}
            {{ @csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> Delete
            </button>
        </form>
    </div>
@endsection
