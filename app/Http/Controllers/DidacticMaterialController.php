<?php

namespace App\Http\Controllers;

use App\Models\DidacticMaterial;
use Illuminate\Http\Request;

class DidacticMaterialController extends Controller
{
    public function index()
    {
        return DidacticMaterial::with('course')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title'     => 'required|string|max:255',
            'file_path' => 'required|string',
            'type'      => 'required|in:pdf,video,link,image',
        ]);
        return DidacticMaterial::create($data);
    }

    public function show(DidacticMaterial $didacticMaterial)
    {
        return $didacticMaterial->load('course');
    }

    public function update(Request $request, DidacticMaterial $didacticMaterial)
    {
        $data = $request->validate([
            'title'     => 'sometimes|string|max:255',
            'file_path' => 'sometimes|string',
            'type'      => 'sometimes|in:pdf,video,link,image',
        ]);
        $didacticMaterial->update($data);
        return $didacticMaterial;
    }

    public function destroy(DidacticMaterial $didacticMaterial)
    {
        $didacticMaterial->delete();
        return response()->noContent();
    }
}
