<?php

namespace App\Http\Controllers;

use App\Models\RoboticsKit;
use Illuminate\Http\Request;

class RoboticsKitController extends Controller
{
    public function index()
    {
        return RoboticsKit::with('courses')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|unique:robotics_kits',
            'description' => 'nullable|string',
        ]);
        return RoboticsKit::create($data);
    }

    public function show(RoboticsKit $roboticsKit)
    {
        return $roboticsKit->load('courses');
    }

    public function update(Request $request, RoboticsKit $roboticsKit)
    {
        $data = $request->validate([
            'name'        => 'sometimes|string|unique:robotics_kits,name,' . $roboticsKit->id,
            'description' => 'nullable|string',
        ]);
        $roboticsKit->update($data);
        return $roboticsKit;
    }

    public function destroy(RoboticsKit $roboticsKit)
    {
        $roboticsKit->delete();
        return response()->noContent();
    }
}
