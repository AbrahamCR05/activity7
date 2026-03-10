<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with(['roboticsKit', 'didacticMaterials'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_key'  => 'required|string|unique:courses',
            'title'       => 'required|string|max:255',
            'cover_image' => 'nullable|string',
            'content'     => 'required|string',
            'kit_id'      => 'required|exists:robotics_kits,id',
        ]);
        return Course::create($data);
    }

    public function show(Course $course)
    {
        return $course->load(['roboticsKit', 'didacticMaterials', 'groups']);
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title'       => 'sometimes|string|max:255',
            'cover_image' => 'nullable|string',
            'content'     => 'sometimes|string',
            'kit_id'      => 'sometimes|exists:robotics_kits,id',
        ]);
        $course->update($data);
        return $course;
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->noContent();
    }
}
