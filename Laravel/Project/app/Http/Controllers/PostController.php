<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $logged_in = Auth::user();
        $users = User::all();
        return view('posts.create', ['users' => $users, 'logged_in' => $logged_in]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $author = User::find($request->input('user'));
        if (!$author) {
            return "Author not found, commence troubleshooting" . "<br>" . $request->input('user');
        }
        if ($request->file('image')->isValid()){
            $path = $request->file('image')->store('posts', 'public');
        }
        $slug = Str::slug($request->input('title'));
        $enabled = !empty($request->input('enabled'));
        if ($enabled){
            $published = now();
            $post = Post::create([
                'title' => $request->input('title'), 
                'image' => $path,
                'body' => $request->input('body'), 
                'user_id' => $author->id, 
                'slug' => $slug, 
                'is_public' => $enabled, 
                'published_at' => $published]);
        } else {
            $post = Post::create([
                'title' => $request->input('title'), 
                'image' => $path,
                'body' => $request->input('body'), 
                'user_id' => $author->id, 
                'slug' => $slug, 
                'is_public' => $enabled]);
        }
        event(new PostCreated($post));
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $intID = (int) $id;
        if(is_int($intID)){
            // $current = User::where('id', $intID)->get();
            $current = Post::find($intID);
            // echo $current;
            return view('posts.show', ['current' => $current]);
        }else{ return "ID needs to be an integer"; }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logged_in = Auth::user();
        $users = User::all();
        $toEdit = Post::find($id);
        if($logged_in -> id == $toEdit -> user_id){
            return view('posts.edit', ['users' => $users, 'posts' => $toEdit, 'id' => $id, 'logged_in' => $logged_in]);
        }else{
            return redirect()->route('posts.show', $toEdit->id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug = Str::slug($request->input('title'));
        $enabled = !empty($request->input('enabled'));
        if ($enabled){
            $published = now();
            Post::find($id)->update(
                ['title' => $request->input('title'),
                'body' => $request->input('body'),
                'slug' => $slug,
                'is_public' => $enabled,
                'published_at' => $published,
                'user_id' => $request->input('user')] );
        } else {
            $published = null;
            Post::find($id)->update(
                ['title' => $request->input('title'),
                'body' => $request->input('body'),
                'slug' => $slug,
                'is_public' => $enabled,
                'published_at' => $published,
                'user_id' => $request->input('user')] );
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return "Post not found. Commence troubleshooting.";
        }
    
        $post->delete();
        return redirect()->route('posts.index');
    }
}
