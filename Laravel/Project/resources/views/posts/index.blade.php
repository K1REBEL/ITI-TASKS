
@extends('layouts.main')
@section('title', "Posts List")

@section('navbar')
@include('includes.navbar')
@endsection

@section('content')
<table>
   <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Image</th>
      <th>Content</th>
      <th>Created By</th>
   </tr>
   @foreach ($posts as $post)
      @if($post -> is_public == 1)
         <tr>
            <td>{{ $post -> id }}</td>
            <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}">{{ $post -> title }}</a></td>
            <td><img src="{{ asset('storage/' . $post -> image) }}" alt="{{ $post -> title }}"</td>
            <td>{{ $post -> body }}</td>
            <td>{{ $post -> user_id }}</td>
            <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}/edit"><button>Edit</button></a></td>
            <td><a href="http://127.0.0.1:8000/posts/{{ $post -> id }}/delete"><button>Delete</button></a></td>
         </tr>
      @endif
   @endforeach
</table>

{{ $posts->links() }}
@endsection