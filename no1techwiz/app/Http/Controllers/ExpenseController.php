<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return response()->json($expenses);
    }

    public function show($id)
    {
        $expense = Expense::find($id);
        
        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }

        return response()->json($expense);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'trip_id' => 'required|exists:trips,trip_id',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'expense_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $expense = Expense::create($validatedData);

        return response()->json($expense, 201);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);

        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'sometimes|exists:users,user_id',
            'trip_id' => 'sometimes|exists:trips,trip_id',
            'amount' => 'sometimes|numeric|min:0',
            'type' => 'sometimes|string|max:255',
            'expense_date' => 'sometimes|date',
            'notes' => 'nullable|string',
        ]);

        $expense->update($validatedData);

        return response()->json($expense);
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);

        if (!$expense) {
            return response()->json(['error' => 'Expense not found'], 404);
        }

        $expense->delete();

        return response()->json(['message' => 'Expense deleted successfully']);
    }
}