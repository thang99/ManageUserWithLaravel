@extends('users.header')

@section('title','Reset password')

@section('content')
    <h2 class="text-center mb-5 mt-3">Reset Password</h2>
    <form method="POST" action="{{ route('resetpwd') }}" >
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email" name="email">
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="pwd">New Password:</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" id="pwd" name="password">
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control @error('confirm__password') is-invalid @enderror" placeholder="Enter password" id="cpwd" name="confirm__password">
            @error('confirm__password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-3">Reset</button>
      </form>
@endsection