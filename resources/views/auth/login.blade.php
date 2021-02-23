@extends('layout.master')
@section('content')
    <div id="logreg-forms" style="width: 50%;margin: auto">
        <form method="POST" action="{{route('login')}}" class="form-signup">
            @csrf
            <input type="email" id="user-email" value="{{old('email')}}" name="email" class="form-control"
                   placeholder="Email address" autofocus="">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <input type="password" id="user-pass" value="{{old('password')}}" name="password" class="form-control"
                   placeholder="Password" autofocus="">
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
        </form>
    </div>

@endsection
