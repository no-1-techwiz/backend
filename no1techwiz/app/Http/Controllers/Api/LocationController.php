<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Hiển thị danh sách các location
     */
    public function index()
    {
        $locations = Location::with(['locationTemplate', 'trip'])->get();
        return response()->json($locations);
    }

    /**
     * Lưu một location mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_template_id' => 'required|exists:location_templates,id',
            'trip_id' => 'required|exists:trips,id',
        ]);

        $location = Location::create($request->all());

        return response()->json($location, 201);
    }

    /**
     * Hiển thị một location theo ID
     */
    public function show(Location $location)
    {
        $location->load(['locationTemplate', 'trip']);
        return response()->json($location);
    }

    /**
     * Cập nhật một location
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'location_template_id' => 'sometimes|exists:location_templates,id',
            'trip_id' => 'sometimes|exists:trips,id',
        ]);

        $location->update($request->all());

        return response()->json($location);
    }

    /**
     * Xóa một location
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(null, 204);
    }
}