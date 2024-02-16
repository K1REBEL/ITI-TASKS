
@extends('layouts.main')
@section('title', "Show a Post")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Post</h1>

<h2>Post ID: {{ $current -> id }}</h2>
<h2>Author ID: {{ $current -> user_id }}</h2>
<h2>Post Title: {{ $current -> title }}</h2>
<h2>Post Content: {{ $current -> body }}</h2>
@if ($current->enabled == 1)
   <h2>Post is public</h2>
@else
   <h2>Post is not public</h2>
@endif

@endsection