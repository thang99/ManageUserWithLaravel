@extends('users.header')

@section('title','List User')

@section('content')
    <button type="button" class="btn btn-secondary mt-4" onclick="window.location= '{{ route('logout') }}'" >Logout</button>
    <h2 class="text-center mt-3 mb-5">List User</h2>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('status') }}</strong>
        </div>      
    @endif

    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('fail') }}</strong>
        </div>      
    @endif
    <form action="/users" method="GET">
        <div class="form-group">
            <input type="text" name="search" id="search" style="width: 400px; height:38px ">
            <button class="btn btn-info">Search</button>
        </div>
        
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users)>0)
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user-> id }}</td>
                    <td>{{ $user-> name }}</td>
                    <td>{{ $user-> birthday }}</td>
                    <td>{{ $user-> address }}</td>
                    <td>{{ $user-> telephone }}</td>
                    <td>{{ $user-> email }}</td>
                    <td>{{ Hash::make($user-> password) }}</td>
                    <td>{{ $user-> role == 0 ? 'Admin' : 'Member' }}</td>
                    <td>
                        <a href="edit/{{ $user->id }}" class="btn btn-success" role="button">Edit</a>
                        <a href="delete/{{ $user->id }}" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa người này ?')" role="button">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-danger text-center">Result not found !!!</td>
                </tr>
            @endif          
        </tbody>   
    </table> 
        {{ $users->links() }}
    <button type="button" class="btn btn-primary mt-3 mb-4" onclick="window.location= '{{ route('add') }}' ">Add</button>
@endsection