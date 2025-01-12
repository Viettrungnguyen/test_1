<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // pagination : phan trang --> giam dung luong data lay ra va gui ve fe 
        $users = User::all(); // Lấy danh sách tất cả người dùng -> select * from users
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,staff,customer',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id); // tim cho t cai ban ghi co id == $id neu ko tim duoc thi return false
        return view('admin.users.edit', compact('user'));
    }


    //chua thong tin cap nhat (name, role, email)
    // id --> user id can duoc update nhung truong tren
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // unique: ten bang, ten cot, ngoai le --> check xem trong bang nay va cot nay co email nao trung ko ngoai tru email minh dang update
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,staff,customer',
            // 'phone' => 'nullable|string|max:20',
            // 'address' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make('default123')]); // Đặt lại mật khẩu mặc định

        return redirect()->route('admin.users.index')->with('success', 'Password reset successfully!');
    }

}
