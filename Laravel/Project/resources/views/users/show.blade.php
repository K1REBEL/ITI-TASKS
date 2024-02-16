
@extends('layouts.main')
@section('title', "Show a User")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>User Posts</h1>

<h2>UserID: {{ $current -> id }}</h2>
<h2>Name: {{ $current -> name }}</h2>
<h2>E-mail: {{ $current -> email }}</h2>

<table>
   <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Content</th>
   </tr>
   @foreach ($posts as $post)
      <tr>
         <td>{{ $post -> id }}</td>
         <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}">{{ $post -> title }}</a></td>
         <td>{{ $post -> body }}</td>
         <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}/edit"><button>Edit</button></a></td>
         <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}/delete"><button>Delete</button></a></td>
      </tr>
   @endforeach
</table>

@endsection