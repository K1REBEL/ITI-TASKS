
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
   </tr>
   @foreach ($users as $user)
      <tr>
         <td>{{ $user -> id }}</td>
         <td><a href="users/{{ $user -> id }}">{{ $user->name }}</a></td>

         <td>{{ $user -> email }}</td>
         <td><a href="users/{{ $user -> id }}/edit"><button>Edit</button></a></td>
         <td><a href="127.0.0.1:8000/delete"><button>Delete</button></a></td>
      </tr>
   @endforeach
</table>
@endsection