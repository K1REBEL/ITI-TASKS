
@extends('layouts.main')
@section('title', "Show a User")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Update User Data</h1>

<form action="{{ route('users.update', $id) }}" method="GET">
   <label for="username">Name: </label>
   <input type="text" name="username" value="{{ $user -> name }}">
   <label for="email">E-mail: </label>
   <input type="email" name="email" value="{{ $user -> email }}">
   <button type="submit" value="submit">Submit</button>
</form>

@endsection