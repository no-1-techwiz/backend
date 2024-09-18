<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return response()->json($trips);
    }

    public function show($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }

        return response()->json($trip);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'trip_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'destination' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
        ]);

        $trip = Trip::create($validatedData);

        return response()->json($trip, 201);
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'sometimes|exists:users,user_id',
            'trip_name' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'destination' => 'sometimes|string|max:255',
            'budget' => 'sometimes|numeric|min:0',
        ]);

        $trip->update($validatedData);

        return response()->json($trip);
    }

    public function destroy($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }

        $trip->delete();

        return response()->json(['message' => 'Trip deleted successfully']);
    }
}