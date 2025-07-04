<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ubah ke password yang aman di produksi
        ]);

        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            $admin->roles()->attach($adminRole->id);
        }
    }
}
