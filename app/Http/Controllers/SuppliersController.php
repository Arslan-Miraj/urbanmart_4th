<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Models\Cities;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = Suppliers::where('deleted', 0)->paginate(7);
        return view('suppliers.index', compact('data'));
    }

    public function create()
    {
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('suppliers.add', compact('city_dropdown'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'email' => 'required',
        ]);

        $data = Suppliers::create([
            'name' => $request->name,
            'phone_no' => $request->contact,
            'email' => $request->email,
            'city_id' => $request->city
        ]);
        $data->save();
        return redirect()->route('suppliers.index');
    }

    public function show(string $id)
    {
        $view = Suppliers::with('getCity')->find($id)->first();
        return view('suppliers.view', compact('view'));
    }

    public function edit(string $id)
    {
        $data = Suppliers::find($id);
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('suppliers.update', compact('data', 'city_dropdown'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'city' => 'required',
            'email' => 'required',
        ]);
        
        Suppliers::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'phone_no' => $request->contact,
                        'email' => $request->email,
                        'city_id' => $request->city
                    ]);
        return redirect()->route('suppliers.index');
    }

    public function destroy(string $id)
    {
        Suppliers::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('suppliers.index');
    }
}
