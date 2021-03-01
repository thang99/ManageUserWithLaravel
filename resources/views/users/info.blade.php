@extends('users.header')

@section('title','Info User')

@section('content')
    <h2 class="text-center mb-5 mt-3">Info User</h2>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $users[0]->id; ?> " readonly>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo $users[0]->name; ?>" readonly>
        </div>
        <div class="form-group">                                       
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" placeholder="Enter birthday" id="birthday" name="birthday" value="<?php echo $users[0]->birthday; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" value="<?php echo $users[0]->address; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" placeholder="Enter telephone" id="telephone" name="telephone" value="<?php echo $users[0]->telephone; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" placeholder="Enter email" id="email" name="email" value="<?php echo $users[0]->email; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" value="<?php echo $users[0]->password; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Confirm password" id="cpwd" name="confirm__password" value="<?php echo $users[0]->password; ?>" readonly >
        </div>
        <a href="/users/info/profile/{{ $users[0]->id }}" class="btn btn-primary" role="button">Change Profile</a>
        <a href="/users/info/password/{{ $users[0]->id }}" class="btn btn-success" role="button">Change Password</a>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('logout') }}' ">Back</button>
    </form>
@endsection