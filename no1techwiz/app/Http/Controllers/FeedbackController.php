<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }

    public function show($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['error' => 'Feedback not found'], 404);
        }

        return response()->json($feedback);
    }

    // Các phương thức CRUD khác yêu cầu xác thực
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start' => 'required|integer|between:1,5',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,user_id',
            'role' => 'required|string|max:255',
        ]);

        $feedback = Feedback::create($validatedData);

        return response()->json($feedback, 201);
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['error' => 'Feedback not found'], 404);
        }

        $validatedData = $request->validate([
            'start' => 'sometimes|integer|between:1,5',
            'description' => 'nullable|string',
            'user_id' => 'sometimes|exists:users,user_id',
            'role' => 'sometimes|string|max:255',
        ]);

        $feedback->update($validatedData);

        return response()->json($feedback);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['error' => 'Feedback not found'], 404);
        }

        $feedback->delete();

        return response()->json(['message' => 'Feedback deleted successfully']);
    }
}