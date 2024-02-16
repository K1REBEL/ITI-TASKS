
@extends('layouts.main')
@section('title', "Update Post")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')

<h1>Update Post Data</h1>

<form action="{{ route('posts.update', $id) }}" method="POST">
   @csrf
   @method('PATCH')
   <label for="title">Post Title: </label>
   <input type="text" name="title" value="{{ $posts -> title }}">
   <label for="content">Post Content: </label>
   <textarea rows = "5" cols = "60" name = "body">
      {{ $posts -> body }}
   </textarea>
   <br>
   @auth
      <input type="text" name="user" value="{{ $logged_in -> id }}" readonly hidden>
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
   @if ( $posts -> enabled == 1 )
      <input type="checkbox" name="enabled" value="enabled" checked>
      <label for="enabled">Enable</label>
      <br>
   @elseif( $posts -> enabled == 0 )
      <input type="checkbox" name="enabled" value="enabled">
      <label for="enabled">Enable</label>
      <br>
   @endif

   <button type="submit" value="submit">Submit</button>
</form>

@endsection