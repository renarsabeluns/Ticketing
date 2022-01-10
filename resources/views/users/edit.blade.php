@extends('layouts.app')

@section('content')
<!--If there are no users dont display the table-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </div>
                @endif
                <form action="{{route('users.update-profile', ['user' => $user])}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">
                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    </label>
                    <label for="email">
                        <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                    </label>
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection