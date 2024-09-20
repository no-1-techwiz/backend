<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Hiển thị danh sách các feedback
     */
    public function index()
    {
        $feedbacks = Feedback::with('user')->get();
        return response()->json($feedbacks);
    }

    /**
     * Lưu một feedback mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $feedback = Feedback::create($request->all());

        return response()->json($feedback, 201);
    }

    /**
     * Hiển thị một feedback theo ID
     */
    public function show(Feedback $feedback)
    {
        $feedback->load('user');
        return response()->json($feedback);
    }

    /**
     * Cập nhật một feedback
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'content' => 'sometimes|string',
        ]);

        $feedback->update($request->all());

        return response()->json($feedback);
    }

    /**
     * Xóa một feedback
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return response()->json(null, 204);
    }
}