<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except(['show']);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        //
        if($request->validated()){
            $data = $request->except('_token');
            $user = User::create($data);
            return redirect()->route('users.index')->with([
                'success' => 'User added successfully'
            ]);
        }
    }

    public function show(User $user)
    {
        return view('users.show')->with([
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //
        if($request->validated()){
            $data = $request->except('_token');
            $user->update($data);
            return redirect()->route('users.index')->with([
                'success' => 'User updated successfully'
            ]);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with([
            'success' => 'User deleted successfully'
        ]);
    }

    public function toggleActive(User $user){
        $user->update([
            'active' => $user->active ? 0 : 1
        ]);
        return redirect()->route('users.index')->with([
            'success' => 'User updated successfully'
        ]);
    }

    // Implement other CRUD methods like create, store, edit, update, destroy as needed
}
