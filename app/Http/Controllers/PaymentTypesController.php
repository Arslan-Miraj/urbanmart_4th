<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;

class PaymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaymentTypes::where('deleted', 0)->paginate(7);
        return view('payment_types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment_types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = PaymentTypes::create([
            'name' => $request->name,
        ]);
        $data->save();
        return redirect()->route('payment_types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = PaymentTypes::find($id)->first();
        return view('payment_types.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PaymentTypes::find($id);
        return view('payment_types.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        PaymentTypes::where('id', $id)
                    ->update([
                        'name' => $request->name,
                    ]);
        return redirect()->route('payment_types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PaymentTypes::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('payment_types.index');
    }
}
