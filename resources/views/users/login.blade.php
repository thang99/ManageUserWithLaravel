@extends('users.header')

@section('title','Login')

@section('content')
    <h2 class="text-center mb-5 mt-3">Login</h2>

    @if (session('status'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>{{ session('status') }}</strong>
      </div>      
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email" name="email">
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Enter password" id="pwd" name="password">
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- <div class="form-check mb-3">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Remember me
          </label>
        </div> --}}
        <a href="resetpassword">Forgot Password ?</a> 
        <span class="ml-3">No has an account</span>&nbsp;
        <a href="register">Sign up</a>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Login</button>
        <a href="{{ url('login/google') }}" class="btn btn-danger mt-3" role="button">Login With Google</a>
        <a href="{{ url('login/facebook') }}" class="btn btn-primary mt-3" role="button">Login With Facebook</a>
        <a href="{{ url('login/twitter') }}" class="btn btn-info mt-3" role="button">Login With Twitter</a>
      </form>
@endsection