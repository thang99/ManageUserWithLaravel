@extends('users.header')

@section('title','Add User')

@section('content')
    <h2 class="text-center mb-5 mt-3">Add New User</h2>

    <form action="/users/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" placeholder="Enter birthday" id="birthday" name="birthday" value="{{ old('birthday') }}">
            @error('birthday')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="Enter telephone" id="telephone" name="telephone" value="{{ old('telephone') }}">
            @error('telephone')
             <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}">
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
        <div class="form-group">
            <label for="role">Role:</label>
            <div class="form-check-inline ml-3">
                <label class="form-check-label" for="radio1">
                  <input type="radio" class="form-check-input" id="radio1" name="role" value="0" checked>Admin
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="radio2">
                  <input type="radio" class="form-check-input" id="radio2" name="role" value="1">Member
                </label>
              </div>
        </div>
        <button type="submit" class="btn btn-primary mr-4" >Add</button>
        <button type="button" class="btn btn-success" onclick="window.location= '{{ route('list') }}'">Back</button>
    </form>
@endsection