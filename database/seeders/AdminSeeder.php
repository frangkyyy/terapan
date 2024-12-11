<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleGuru = Role::firstOrCreate(['name' => 'guru']);
        $roleGuruWali = Role::firstOrCreate(['name' => 'guru wali']);
        $roleWakasek = Role::firstOrCreate(['name' => 'wakasek']);
        $roleSiswa = Role::firstOrCreate(['name' => 'siswa']);

        // Step 2: Create an admin user (or use an existing one)
        $admin = User::create([
            'nrp' => '0000001',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // Use your own password
        ]);

        // Step 3: Assign the 'admin' role to the admin user
        $admin->roles()->attach($roleAdmin->id);
    }
}
