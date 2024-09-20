<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // Hiển thị danh sách các chuyến đi
    public function index()
    {
        $trips = Trip::with('user')->get(); // Load thông tin người dùng nếu cần
        return response()->json($trips);
    }

    // Hiển thị chuyến đi theo ID
    public function show(Trip $trip)
    {
        return response()->json($trip);
    }

    // Lưu chuyến đi mới
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'trip_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'destination' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $trip = Trip::create($request->all());

        return response()->json($trip, 201);
    }

    // Cập nhật chuyến đi
    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'trip_name' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'destination' => 'sometimes|string|max:255',
            'budget' => 'sometimes|numeric',
            'note' => 'nullable|string',
        ]);

        $trip->update($request->all());

        return response()->json($trip);
    }

    // Xóa chuyến đi
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return response()->json(null, 204);
    }
}