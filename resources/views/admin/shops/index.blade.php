@extends('layouts.admin')

@section('title', 'Quản lý cửa hàng')

@section('content')
    <div class="container mt-4">
        <h2>Danh sách cửa hàng</h2>
        <a href="{{ route('shops.create') }}" class="btn btn-primary mt-2 mb-3">Thêm cửa hàng mới</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($shops) > 0)
                    @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->address }}</td>
                            <td>{{ $shop->phone }}</td>
                            <td>{{ $shop->email }}</td>
                            <td>
                                <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('shops.destroy', $shop->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>khong co gia tri nao</td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
@endsection
