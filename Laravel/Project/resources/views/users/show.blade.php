
@extends('layouts.main')
@section('title', "Show a User")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Create a new User</h1>

<h2>UserID: {{ $current -> id }}</h2>
<h2>Name: {{ $current -> name }}</h2>
<h2>E-mail: {{ $current -> email }}</h2>

@endsection