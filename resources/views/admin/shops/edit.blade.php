@extends('layouts.admin')

@section('title', 'Sửa thông tin cửa hàng')

@section('content')
    <div class="container mt-4">
        <h2>Sửa thông tin cửa hàng</h2>
        <form action="{{ route('shops.update', $shop->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên cửa hàng</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $shop->name }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $shop->address }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $shop->phone }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $shop->email }}"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('shops.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
