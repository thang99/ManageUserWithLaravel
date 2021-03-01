@extends('users.header')

@section('title','Edit Profile User')

@section('content')
    <h2 class="text-center mb-5 mt-3">Edit Password User</h2>

    <form action="<?php echo $users[0]->id; ?>" method="POST">
        @csrf
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" value="<?php echo $users[0]->password; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pwd">New Password:</label>
            <input type="password" class="form-control @error('new__password') is-invalid @enderror" placeholder="Enter password" id="pwd" name="new__password">
            @error('new__password')
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
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('list') }}'">Back</button>
    </form>
@endsection