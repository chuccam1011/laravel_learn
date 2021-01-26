@extends('layout.master')
@section('content')
    <div id="logreg-forms" style="width: 50%;margin: auto">
        <form method="POST" action="{{route('register')}}" class="form-signup">
            @csrf

            <input type="text" name="full_name" value="{{old('full_name')}}" id="user-name" class="form-control"
                   placeholder="Full name" autofocus="">
            @error('full_name')
            <p class="text-danger">{{$message}}</p>
            @enderror

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

            <input type="password" id="user-repeatpass" value="{{old('re-password')}}" name="re-password"
                   class="form-control" placeholder="Repeat Password"
                   autofocus="">
            @error('re-password')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
        </form>
    </div>

@endsection
