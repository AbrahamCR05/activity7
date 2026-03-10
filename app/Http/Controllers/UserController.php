<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::with(['role', 'group'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role_id'  => 'required|exists:roles,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function show(User $user)
    {
        return $user->load(['role', 'group']);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:users,email,' . $user->id,
            'role_id'  => 'sometimes|exists:roles,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);
        $user->update($data);
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
