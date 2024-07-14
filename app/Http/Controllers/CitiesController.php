<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cities::where('deleted', 0)->paginate(7);
        return view('cities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = Cities::create([
            'name' => $request->name,
        ]);
        $data->save();
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = Cities::find($id)->first();
        return view('cities.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Cities::find($id);
        return view('cities.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Cities::where('id', $id)
                    ->update([
                        'name' => $request->name,
                    ]);
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cities::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('categories.index');
    }
}
