@extends('users.header')

@section('title','Edit User')

@section('content')
    <h2 class="text-center mb-5 mt-3">Edit User</h2>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $users[0]->id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo $users[0]->name; ?>" readonly>
            @error('name')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">                                       
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" placeholder="Enter birthday" id="birthday" name="birthday" value="<?php echo $users[0]->birthday; ?>" readonly>
            @error('birthday')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" value="<?php echo $users[0]->address; ?>" readonly>
            @error('address')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" placeholder="Enter telephone" id="telephone" name="telephone" value="<?php echo $users[0]->telephone; ?>" readonly>
            @error('telephone')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" placeholder="Enter email" id="email" name="email" value="<?php echo $users[0]->email; ?>" readonly>
            @error('email')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" value="<?php echo $users[0]->password; ?>" readonly>
            @error('password')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Confirm password" id="cpwd" name="confirm__password" value="<?php echo $users[0]->password; ?>" readonly>
            @error('confirm__password')
            <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            @if ($users[0]->role == 0)
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
            @else
                <div class="form-check-inline ml-3">
                    <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="radio1" name="role" value="0">Admin
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="radio2" name="role" value="1" checked>Member
                    </label>
                </div>
            @endif  
        </div>
        <a href="profile/{{ $users[0]->id }}" class="btn btn-info" role="button">Edit Profile</a>
        <a href="password/{{ $users[0]->id }}" class="btn btn-success" role="button">Edit Password</a>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('list') }}'">Back</button>
    </form>
@endsection