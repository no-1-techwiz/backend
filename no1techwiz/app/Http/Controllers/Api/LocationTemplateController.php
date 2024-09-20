<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LocationTemplate;
use Illuminate\Http\Request;

class LocationTemplateController extends Controller
{
    /**
     * Hiển thị danh sách các location template
     */
    public function index()
    {
        $locationTemplates = LocationTemplate::with('category')->get();
        return response()->json($locationTemplates);
    }

    /**
     * Lưu một location template mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $locationTemplate = LocationTemplate::create($request->all());

        return response()->json($locationTemplate, 201);
    }

    /**
     * Hiển thị một location template theo ID
     */
    public function show(LocationTemplate $locationTemplate)
    {
        $locationTemplate->load('category');
        return response()->json($locationTemplate);
    }

    /**
     * Cập nhật một location template
     */
    public function update(Request $request, LocationTemplate $locationTemplate)
    {
        $locationTemplate = LocationTemplate::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $locationTemplate->update($request->all());

        return response()->json($locationTemplate);
    }

    /**
     * Xóa một location template
     */
    public function destroy(LocationTemplate $locationTemplate)
    {
        $locationTemplate->delete();
        return response()->json(null, 204);
    }
}
