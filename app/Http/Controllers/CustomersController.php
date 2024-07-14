<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Cities;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customers::where('deleted', 0)->paginate(7);
        return view('customers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('customers.add', compact('city_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        $customers = Customers::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->contact,
            'city_id' => $request->city,
            'address' => $request->address,
        ]);
        $customers->save();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = Customers::with('getCity')->find($id);
        return view('customers.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customers::find($id);
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('customers.update', compact('city_dropdown', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
        
        Customers::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone_number' => $request->contact,
                        'city_id' => $request->city,
                        'address' => $request->address,
                    ]);
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customers::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('customers.index');
    }
}
