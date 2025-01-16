@extends('layouts.admin')

@section('title', 'Sửa thông tin danh mục')

@section('content')
    <div class="container mt-4">
        <h2>Sửa thông tin danh mục</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
