<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brands::where('deleted', 0)->paginate(7);
        return view('brands.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = Brands::create([
            'name' => $request->name,
        ]);
        $data->save();
        return to_route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = Brands::find($id)->first();
        return view('brands.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Brands::find($id);
        return view('brands.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brands::where('id', $id)
                    ->update([
                        'name' => $request->name,
                    ]);
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brands::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('brands.index');
    }
}
