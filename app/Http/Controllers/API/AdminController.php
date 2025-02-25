<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;  // Sử dụng model User cho bảng users

class AdminController extends Controller
{
    /**
     * Xử lý đăng nhập.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào (sử dụng admin_name thay vì email)
        $request->validate([
            'name' => 'required|string|max:255', // Sử dụng admin_name thay vì email
            'password' => 'required|min:6',
        ]);

        // Kiểm tra thông tin đăng nhập (sử dụng admin_name thay vì name)
        $credentials = $request->only('name', 'password');

        // Tìm kiếm admin bằng admin_name trong bảng users
        $user = User::where('name', $credentials['name'])->first();  // Đảm bảo bạn sử dụng đúng trường trong bảng users

        // Kiểm tra nếu user tồn tại và mật khẩu đúng
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Kiểm tra xem người dùng có phải là admin không
            if ($user->role != 'admin') {
                return response()->json([
                    'message' => 'Bạn không có quyền truy cập trang này.',
                ], 403);
            }

            // Nếu đăng nhập thành công và là admin, tạo token
            $token = $user->createToken('AdminToken')->plainTextToken;

            return response()->json([
                'message' => 'Đăng nhập thành công',
                'token' => $token,  
                'role' => $user->role, 
            ]);
            
        }

        // Nếu đăng nhập thất bại
        return response()->json([
            'message' => 'Thông tin đăng nhập không đúng.',
        ], 401);
    }
    public function signup(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',  // Kiểm tra name
            'email' => 'required|email|unique:users,email',  // Kiểm tra email và đảm bảo email là duy nhất
            'password' => 'required|min:6',  // Kiểm tra mật khẩu (tối thiểu 6 ký tự)
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Mã hóa mật khẩu
            'role' => 'admin',  // Cột role mặc định là user
        ]);

        // Tạo token cho người dùng mới
        $token = $user->createToken('UserToken')->plainTextToken;

        // Trả về phản hồi JSON với thông tin người dùng và token
        return response()->json([
            'message' => 'Đăng ký thành công',
            'token' => $token,  // Trả về token
            'user' => $user,  // Trả về thông tin người dùng
        ], 201);
    }
    public function logout(Request $request)
    {
        // Lấy người dùng đã đăng nhập từ token
        $user = Auth::user();
    
        // Xóa tất cả các token của người dùng
        $user->tokens->each(function ($token) {
            $token->delete();
        });
    
        // Trả về phản hồi cho người dùng đã đăng xuất thành công
        return response()->json([
            'message' => 'Đăng xuất thành công.'
        ]);
    }
    
}
