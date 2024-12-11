<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');;
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));    }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|unique:roles,name,' . $id,
            ]);
    
            $role = Role::findOrFail($id);
            $role->update([
                'name' => $request->name,
            ]);
    
            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
        }

        public function destroy($id)
        {
            $role = Role::findOrFail($id);
            $role->delete();
    
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
        }
}
