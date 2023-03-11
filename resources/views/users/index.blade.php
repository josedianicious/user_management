@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Management</h2>
            </div>
            <div class="col-md-6 pull-right mb-2">
               <a class="btn btn-success" href="{{ route('user.create') }}"> Create User</a>

                <a class="btn btn-info" href="{{ route('user.login') }}"> User Login</a>
             </div>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Sex</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->sex_text }}</td>
          </tr>
        @endforeach
        </tbody>

      </table>

{!! $users->links() !!}
@endsection
