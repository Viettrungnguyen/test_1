<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Danh sách cửa hàng
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shops.index', compact('shops'));
    }

    // Form thêm cửa hàng
    public function create()
    {
        return view('admin.shops.create');
    }

    // Xử lý thêm cửa hàng
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:shops',
        ]);

        Shop::create($request->all());

        return redirect()->route('shops.index')->with('success', 'Cửa hàng đã được thêm thành công.');
    }

    // Form cập nhật cửa hàng
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin.shops.edit', compact('shop'));
    }

    // Xử lý cập nhật cửa hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:shops,email,' . $id,
        ]);

        $shop = Shop::findOrFail($id);
        $shop->update($request->all());

        return redirect()->route('shops.index')->with('success', 'Cửa hàng đã được cập nhật thành công.');
    }

    // Xóa cửa hàng
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Cửa hàng đã được xóa thành công.');
    }
}
