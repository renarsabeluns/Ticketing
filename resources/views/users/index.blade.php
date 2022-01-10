@extends('layouts.app')

@section('content')
<!--If there are no users dont display the table-->
@if($users->count()>0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Role</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user )
    <tr>
      <th scope="row">{{$user -> id}}</th>
      <td>{{$user -> name}}</td>
      <td>{{$user -> email}}</td>
      <td>{{$user -> role}}</td>
      <td>
        @if (!$user->isAdmin())
        <form action="{{route('users.make-admin',$user->id)}}" method="post">
          @csrf
          <button type = "submit" class="btn btn-success btn-sm">Make admin</button>
        </form>
        @endif
      </td>
      <td>
      @if ($user->isAdmin())
        <form action="{{route('users.make-employee',$user->id)}}" method="post">
          @csrf
          <button type = "submit" class="btn button-blue btn-sm">Make employee</button>
        </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection