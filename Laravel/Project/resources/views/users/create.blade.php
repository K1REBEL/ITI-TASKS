
@extends('layouts.main')
@section('title', "Create User")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Create a new User</h1>

<form action="{{ route('users.store') }}" method="GET">
   <label for="username">Name: </label>
   <input type="text" name="username">
   <label for="email">E-mail: </label>
   <input type="email" name="email">
   <button type="submit" value="submit">Submit</button>
</form>
@endsection