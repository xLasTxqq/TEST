@extends('master')
@section('title')
    Login
@endsection
@section('section')
    <form class="d-flex flex-column text-center align-items-center" method="POST" action="{{route('log_in')}}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login</label>
            <input required type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
@endsection
