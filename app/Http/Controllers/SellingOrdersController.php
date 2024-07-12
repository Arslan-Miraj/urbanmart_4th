<?php

namespace App\Http\Controllers;

use App\Models\SellingOrders;
use App\Models\SellItems;
use App\Models\PaymentTypes;
use App\Models\Products;
use App\Models\Customers;
use Illuminate\Http\Request;

class SellingOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SellingOrders::where('deleted', 0)->paginate(7);
        return view('selling_orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_dropdown = PaymentTypes::all()->where('deleted', 0);
        $product_dropdown = Products::all()->where('deleted', 0);
        $customer_dropdown = Customers::all()->where('deleted', 0);
        return view('selling_orders.add', compact('payment_dropdown', 'product_dropdown', 'customer_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = SellingOrders::create([
            'customer_id' => $request->name,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'total_amount' => $request->total_amount,
            'payment_method' => $request->payment_method
        ]);
        $data->save();
        foreach ($request->product as $key => $product) {
            $data1 = SellItems::create([
                'sale_id' => $data->id,
                'product_id' => $product,
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
                'total' => $request->total[$key],
    
            ]);
            $data1->save();
        }
        
        return redirect()->route('selling_orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $view = SellingOrders::with('getPaymentMethod', 'getCustomer')->find($id);
        $products = SellItems::with('getProduct')->where('sale_id', $id)->get();
        // dd($view1);
        // return $view;
        return view('selling_orders.view', compact('view', 'products'));
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
        SellingOrders::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('selling_orders.index');
    }
}
