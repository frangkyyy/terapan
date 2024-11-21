<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $role;

    public function loadAllUsers($role)
    {
        if ($role === 'admin') 
        {
            $role = 'admin';
        } 
        elseif ($role === 'guru') 
        {
            $role = 'guru';
        } 
        elseif ($role === 'wakasek') 
        {
            $role = 'wakasek';
        } 
        elseif ($role === 'siswa') 
        {
            $role = 'siswa';
        } 
        else 
        {
            abort(404);
        }
        $all_users = User::where('role', $role)->get();

        return view('admin.datauser', compact('all_users', 'role'));
    }

    public function loadAddForm($role){
        $all_users = User::where('role', $role)->get();;
        return view('admin.add-user', compact('all_users', 'role'));
    }

    public function AddUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => ['required', 'in:admin,guru,wakasek,siswa'],
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string',
            'password' => 'required|min:8|confirmed', // 'confirmed' rule added
        ]);

        try {
            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->role = $request->role;
            $new_user->email = $request->email;
            $new_user->alamat = $request->alamat;
            $new_user->tgl_lahir = $request->tgl_lahir;
            $new_user->no_hp = $request->no_hp;
            $new_user->password = bcrypt($request->password); // Hash password before saving
            $new_user->save();

            return redirect('/admin/datauser/' . $request->role)->with('success', 'Data Added Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/datauser')->with('fail', $e->getMessage());
        }
    }


    public function loadEditForm($id, $role){
            $users = User::findOrFail($id);

            return view('admin.edit-user', compact('users', 'role'));

    }

    public function EditUser(Request $request, $id, $role)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => ['required', 'in:admin,resepsionis,user'],
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string',
            'password' => 'nullable|min:8', // nullable agar password opsional
        ]);

        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_hp = $request->no_hp;

            // Update password jika ada input baru
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect('/admin/datauser/' . $role)->with('success', 'Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/datauser/' . $role)->with('fail', $e->getMessage());
        }
    }




    public function deleteUser($id, $role)
    {
        try {
            // Cari item berdasarkan ID
            $user = User::where('id', $id)->where('role', ucfirst($role))->firstOrFail();

            // Hapus item
            $user->delete();

            // Redirect ke halaman utama jenis
            return redirect()->route('user', ['role' => strtolower($role)])->with('success', 'Data Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('user', ['jenis' => strtolower($role)])->with('fail', 'Data not found or already deleted.');
        }
    }

    public function search(Request $request, $role)
    {
        $query = $request->input('query');

        $all_users = User::where('role', ucfirst($role))
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->orWhere('alamat', 'like', "%$query%")
                ->orWhere('no_hp', 'like', "%$query%");
            })
            ->get();

        return view('admin.index', compact('all_users', 'role'));
    }

}
