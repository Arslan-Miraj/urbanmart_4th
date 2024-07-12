<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Suppliers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Products::where('deleted', 0)->paginate(7);
        return view('products.index', compact('data'));
    }

    public function create()
    {
        $category_dropdown = Categories::all()->where('deleted', 0);
        $brand_dropdown = Brands::all()->where('deleted', 0);
        $supplier_dropdown = Suppliers::all()->where('deleted', 0);
        return view('products.add', compact('category_dropdown', 'brand_dropdown', 'supplier_dropdown'));
    }

    public function store(Request $request)
    {
        $products = Products::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit_price' => $request->unit_price,
            'supplier_id' => $request->supplier_id,
            'brand_id' => $request->brand_id,
            'stock_quantity' => $request->stock_quantity,
        ]);
        $products->save();
        return redirect()->route('products.index');
    }

    public function show(Products $products, $id)
    {
        $view = Products::with('getSupplier', 'getBrand', 'getCategory')->find($id)->first();
        return view('products.view', compact('view'));
    }

    public function edit(string $id)
    {
        $products = Products::find($id);
        $category_dropdown = Categories::all()->where('deleted', 0);
        $brand_dropdown = Brands::all()->where('deleted', 0);
        $supplier_dropdown = Suppliers::all()->where('deleted', 0);
        return view('products.update', compact('category_dropdown', 'brand_dropdown', 'supplier_dropdown', 'products'));
    }

    public function update(Request $request, string $id)
    {
        Products::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'category_id' => $request->category_id,
                        'unit_price' => $request->unit_price,
                        'supplier_id' => $request->supplier_id,
                        'brand_id' => $request->brand_id,
                        'stock_quantity' => $request->stock_quantity,
                    ]);
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        Products::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('products.index');
    }
}
