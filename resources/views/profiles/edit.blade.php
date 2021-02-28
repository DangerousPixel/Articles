@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('profile.update' , $user)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group row">
                <label for="bio" class="col-md-4 col-form-label "> Bio </label>
                <input id="bio" type="text"
                       class="form-control @error ('bio') is-invalid @enderror"
                       name="bio" value="{{ old('bio') ?? $user->profile->bio}}"
                       required autocomplete="bio" autofocus>
                @if ($errors->has('bio'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio') }}</strong>
                        </span>
                @endif
                {{--        @error('bio')--}}
                {{--        <span class="invalid-feedback" role="alert">--}}
                {{--                            <strong>{{ $errors->first('bio') }}</strong> </span>--}}
                {{--        @enderror--}}

                <div class="pt-3">
                    <button class="btn btn-primary btn-sm"> save changes</button>
                </div>

            </div>
        </form>
    </div>
@endsection
