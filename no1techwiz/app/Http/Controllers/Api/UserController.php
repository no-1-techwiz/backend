<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Hiển thị người dùng theo ID
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Lưu người dùng mới
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'name' => $user->name,
        'email' => $user->email,
        'id' => $user->id,
    ], 201);
}

    // Cập nhật người dùng
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|string',
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:8|confirmed']);
            $user->update(['password' => bcrypt($request->password)]);
        }

        return response()->json($user);
    }

    // Xóa người dùng
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Kiểm tra thông tin đăng nhập
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['Thông tin đăng nhập không chính xác.'],
            ]);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Tạo token cá nhân
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'name' => $user->name,
            'email' => $user->email,
            'id' => $user->id,
        ], 201);
    }

    // Đăng xuất người dùng
    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        // Xóa tất cả các token của người dùng (hoặc chỉ token hiện tại)
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công.',
        ]);
    }

    public function loginWithGoogle(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:255',
                'google_id' => 'required|string',
            ]);
    
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                $user = User::create([
                    'name' => 'User from Google',
                    'email' => $request->email,
                    'password' => bcrypt(Str::random(10)),
                    'google_id' => $request->google_id,
                ]);
            } else {
                $user->google_id = $request->google_id;
                $user->save();
            }
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}