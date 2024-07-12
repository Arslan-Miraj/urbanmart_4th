<?php

namespace App\Http\Controllers;

use App\Models\PurchasingOrders;
use App\Models\PaymentTypes;
use App\Models\Suppliers;
use App\Models\Products;
use App\Models\PurchaseItems;
use Illuminate\Http\Request;

class PurchasingOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PurchasingOrders::where('deleted', 0)->paginate(7);
        return view('purchasing_orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_dropdown = PaymentTypes::all()->where('deleted', 0);
        $product_dropdown = Products::all()->where('deleted', 0);
        $supplier_dropdown = Suppliers::all()->where('deleted', 0);
        return view('purchasing_orders.add', compact('payment_dropdown', 'product_dropdown', 'supplier_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = PurchasingOrders::create([
            'supplier_id' => $request->name,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'total_amount' => $request->total_amount,
            'payment_method' => $request->payment_method
        ]);
        $data->save();
        foreach ($request->product as $key => $product) {
            $data1 = PurchaseItems::create([
                'purchase_id' => $data->id,
                'product_id' => $product,
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
                'total_price' => $request->total[$key],
    
            ]);
            $data1->save();
        }
        
        return redirect()->route('purchasing_orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $view = PurchasingOrders::with('getPaymentMethod', 'getSupplier')->find($id);
        $products = PurchaseItems::with('getProduct')->where('purchase_id', $id)->get();
        // dd($view1);
        // return $view;
        return view('purchasing_orders.view', compact('view', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PurchasingOrders::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('purchasing_orders.index');
    }
}
