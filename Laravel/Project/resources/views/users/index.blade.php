
@extends('layouts.main')
@section('title', "User List")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')
<table>
   <tr>
      <th>ID</th>
      <th>Name</th>
      <th>E-mail</th>
      <th>Post Count</th>
   </tr>
   @foreach ($users as $user)
      <tr>
         <td>{{ $user -> id }}</td>
         <td><a href="users/{{ $user -> id }}">{{ $user->name }}</a></td>
         <td>{{ $user -> email }}</td>
         <td>{{ $user -> post_count }}</td>
         <td><a href="127.0.0.1:8000/users/{{ $user -> id }}/edit"><button>Edit</button></a></td>
         <td><a href="127.0.0.1:8000/users/{{ $user -> id }}/delete"><button>Delete</button></a></td>
      </tr>
   @endforeach
</table>

{{ $users->links() }}
@endsection