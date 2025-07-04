<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Role;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['name' => 'Dashboard', 'url' => '/dashboard'],
            ['name' => 'Manajemen User', 'url' => '/admin/users'],
            ['name' => 'Manajemen Role', 'url' => '/admin/roles'],
        ];

        foreach ($menus as $data) {
            $menu = Menu::create($data);
            $menu->roles()->attach(Role::where('name', 'admin')->first()->id);
        }
    }
}
