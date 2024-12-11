<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required|string|max:7',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'email' => $request->email, 
            'password' => bcrypt($request->password),
        ]);

        // Menyimpan role yang dipilih
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nrp' => 'required|string|max:7',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('nrp', 'name', 'email'));

        // Update roles
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
