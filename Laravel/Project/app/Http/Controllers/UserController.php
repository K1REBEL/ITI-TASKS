<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // User::create(['name' => 'user1', 'email' => 'a@g.com']);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo $request;
        User::create(['name' => $request->input('username'), 'email' => $request->input('email')]);
        return "User you just created has been added!";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $intID = (int) $id;
        if(is_int($intID)){
            // $current = User::where('id', $intID)->get();
            $current = User::find($intID);
            // echo $current;
            return view('users.show', ['current' => $current]);
        }else{ return "ID needs to be an integer"; }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $toEdit = User::find($id);
        return view('users.edit', ['user' => $toEdit, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::find($id)->update(
            ['name' => $request->input('username'),
            'title' => $request->input('email')] );
        return "You updated user no. $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
