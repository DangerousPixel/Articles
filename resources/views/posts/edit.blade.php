@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('article.update' , $post)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Edit Art!cle</h1>
                    </div>

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
                        <label for="article" class="col-md-4 col-form-label">Article </label>
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
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">☠ Delete post
                        ☠
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
