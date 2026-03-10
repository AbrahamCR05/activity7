<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|unique:roles']);
        return Role::create($data);
    }

    public function show(Role $role)
    {
        return $role->load('users');
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate(['name' => 'required|string|unique:roles,name,' . $role->id]);
        $role->update($data);
        return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
