@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('article.store')}}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Add New Art!cle</h1>
                    </div>

                    {{--  Title field  --}}
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title </label>
                        <input id="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title"
                               value="{{ old('title') }}"
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
                               class="form-control{{ $errors->has('article') ? ' is-invalid' : '' }}"
                               name="article"
                               value="{{ old('article') }}"
                               autocomplete="article" autofocus>

                        @if ($errors->has('article'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('article') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" id="inlineCheckbox1" value="{{$tag->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">{{$tag->name}}</label>
                            </div>
                        @endforeach

                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
