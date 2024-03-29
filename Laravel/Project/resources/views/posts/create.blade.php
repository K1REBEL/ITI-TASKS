
@extends('layouts.main')
@section('title', "Create a Post")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Create a new Post</h1>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
   @csrf
   
   <label for="title">Post Title: </label>
   <input type="text" name="title"> <br>

   <label for="image">Choose an Image</label>
   <input type="file" name="image"> <br>
   
   <label for="content">Post Content: </label>
   <textarea rows = "5" cols = "60" name = "body" placeholder="What does you post say?"></textarea>
   <br>

   @auth
      <input type="hidden" name="user" value="{{ $logged_in -> id }}" readonly>
   @else
      <select name="user">
         @foreach ($users as $user)
         <option value="{{ $user -> id }}">
            {{ $user -> name }}
         </option>
         @endforeach
      </select>
   @endauth

   <br>
   <input type="checkbox" name="is_public" value="is_public">
   <label for="is_public">Publish Right Away</label>
   <br>
   <button type="submit" value="submit">Submit</button>
</form>
@endsection