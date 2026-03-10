<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return Group::with('courses')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        return Group::create($data);
    }

    public function show(Group $group)
    {
        return $group->load(['users', 'courses']);
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);
        $group->update($data);
        return $group;
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->noContent();
    }
}
