<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Hiển thị danh sách tất cả các chi phí.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $expenses = Expense::all();

        return response()->json([
            'success' => true,
            'data' => $expenses,
        ], 200);
    }

    /**
     * Lưu trữ một chi phí mới.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'cost' => 'required|numeric|min:0',
        ]);

        $expense = Expense::create([
            'location_id' => $request->location_id,
            'cost' => $request->cost,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Expense created successfully',
            'data' => $expense,
        ], 201);
    }

    /**
     * Hiển thị chi tiết của một chi phí cụ thể.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Expense $expense)
    {
        return response()->json([
            'success' => true,
            'data' => $expense,
        ], 200);
    }

    /**
     * Cập nhật một chi phí cụ thể.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'location_id' => 'sometimes|required|exists:locations,id',
            'cost' => 'sometimes|required|numeric|min:0',
        ]);

        $expense->update($request->only(['location_id', 'cost']));

        return response()->json([
            'success' => true,
            'message' => 'Expense updated successfully',
            'data' => $expense,
        ], 200);
    }

    /**
     * Xóa một chi phí cụ thể.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Expense deleted successfully',
        ], 200);
    }
}
