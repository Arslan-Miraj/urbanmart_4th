<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

use App\Models\Warehouses;
use App\Models\Products;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventory::where('deleted', 0)->paginate(7);
        return view('inventory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse_dropdown = Warehouses::all()->where('deleted', 0);
        $product_dropdown = Products::all()->where('deleted', 0);
        return view('inventory.add', compact('warehouse_dropdown', 'product_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Inventory::create([
            'warehouse_id' => $request->warehouse,
            'product_id' => $request->product,
            'stock_quantity' => $request->stock_quantity,
        ]);
        $data->save();
        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products, $id)
    {
        $view = Inventory::with('getWarehouse', 'getProduct')->find($id)->first();
        return view('inventory.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Inventory::find($id);
        $warehouse_dropdown = Warehouses::all()->where('deleted', 0);
        $product_dropdown = Products::all()->where('deleted', 0);
        return view('inventory.update', compact('warehouse_dropdown', 'product_dropdown', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Inventory::where('id', $id)
                    ->update([
                        'warehouse_id' => $request->warehouse,
                        'product_id' => $request->product,
                        'stock_quantity' => $request->stock_quantity,
                    ]);
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inventory::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('inventory.index');
    }
}
