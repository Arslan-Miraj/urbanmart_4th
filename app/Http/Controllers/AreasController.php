<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Cities;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Areas::where('deleted', 0)->paginate(7);
        return view('areas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('areas.add', compact('city_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required'
        ]);

        $data = Areas::create([
            'name' => $request->name,
            'city_id' => $request->city
        ]);
        $data->save();
        return to_route('areas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = Areas::find($id)->first();
        return view('areas.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Areas::find($id);
        $city_dropdown = Cities::all()->where('deleted', 0);
        return view('areas.update', compact('data', 'city_dropdown'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required'
        ]);

        Areas::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'city_id' => $request->city
                    ]);
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Areas::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('areas.index');
    }
}
