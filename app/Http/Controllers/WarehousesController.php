<?php

namespace App\Http\Controllers;

use App\Models\Warehouses;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Areas;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Warehouses::where('deleted', 0)->paginate(7);
        return view('warehouse.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city_dropdown = Cities::where('deleted', 0)->get();
        $area_dropdown = Areas::where('deleted', 0)->get();
        return view('warehouse.add', compact('city_dropdown', 'area_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Warehouses::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'city_id' => $request->city,
            'address' => $request->address,
            'area_id' => $request->area
        ]);
        $data->save();
        return redirect()->route('warehouse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = Warehouses::with('getCity', 'getArea')->find($id)->first();
        return view('warehouse.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Warehouses::find($id);
        $city_dropdown = Cities::where('deleted', 0)->get();
        $area_dropdown = Areas::where('deleted', 0)->get();
        return view('warehouse.update', compact('city_dropdown', 'area_dropdown', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Warehouses::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'capacity' => $request->capacity,
                        'city_id' => $request->city,
                        'address' => $request->address,
                        'area_id' => $request->address
                    ]);
        return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Warehouses::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('warehouse.index');
    }

    public function getarea(Request $request){
        $area = Areas::where('city_id', $request->city)->where('deleted', 0)->get();
        return response()->json($area);
        // echo $request->city;
    }
}
