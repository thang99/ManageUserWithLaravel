@extends('users.header')

@section('title','Register User')

@section('content')
    <h2 class="text-center mb-3 mt-3">Register</h2>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('status') }}</strong>
        </div>      
    @endif

    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter name" id="name" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" placeholder="Enter birthday" id="birthday" name="birthday">
            @error('birthday')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter address" id="address" name="address">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" placeholder="Enter telephone" id="telephone" name="telephone">
            @error('telephone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" id="email" name="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" id="pwd" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control @error('confirm__password') is-invalid @enderror" placeholder="Confirm password" id="cpwd" name="confirm__password">
            @error('confirm__password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <span>Have an account</span>&nbsp;
        <a href="login">Sign in</a>
        <br>
        <button type="submit" class="btn btn-primary mr-4 mt-3" >Register</button>
    </form>
@endsection