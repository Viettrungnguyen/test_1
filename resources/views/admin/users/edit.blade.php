@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa người dùng</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Nhân viên</option>
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
