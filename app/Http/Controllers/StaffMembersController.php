<?php

namespace App\Http\Controllers;

use App\Models\StaffMembers;
use Illuminate\Http\Request;
use App\Models\Roles;

class StaffMembersController extends Controller
{
    public function index()
    {
        $data = StaffMembers::where('deleted', 0)->paginate(7);
        return view('staff_members.index', compact('data'));
    }

    public function create()
    {
        $role_dropdown = Roles::where('deleted', 0)->get();
        return view('staff_members.add', compact('role_dropdown'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'role' => 'required',
        ]);

        $data = StaffMembers::create([
            'username' => $request->name,
            'email' => $request->email,
            'contact_no' => $request->contact,
            'role_id' => $request->role
        ]);
        $data->save();
        return redirect()->route('staff_members.index');
    }

    public function show(string $id)
    {
        $view = StaffMembers::with('getRole')->find($id)->first();
        return view('staff_members.view', compact('view'));
    }

    public function edit(string $id)
    {
        $data = StaffMembers::find($id);
        $role_dropdown = Roles::where('deleted', 0)->get();
        return view('staff_members.update', compact('role_dropdown', 'data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'role' => 'required',
        ]);
        
        StaffMembers::where('id', $id)->update([
                        'username' => $request->name,
                        'email' => $request->email,
                        'contact_no' => $request->contact,
                        'role_id' => $request->role
                    ]);
        return redirect()->route('staff_members.index');
    }

    public function destroy(string $id)
    {
        StaffMembers::where('id', $id)
                    ->update([
                        'deleted' => 1,
                    ]);
        return redirect()->route('staff_members.index');
    }
}
