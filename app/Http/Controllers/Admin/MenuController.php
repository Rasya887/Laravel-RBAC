<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Role;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('roles')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.menus.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'role_ids' => 'array|required'
        ]);

        $menu = Menu::create($request->only('name', 'url'));
        $menu->roles()->attach($request->role_ids);

        return redirect()->route('menus.index')->with('success', 'Menu created.');
    }

    public function edit(Menu $menu)
    {
        $roles = Role::all();
        $menuRoles = $menu->roles->pluck('id')->toArray();
        return view('admin.menus.edit', compact('menu', 'roles', 'menuRoles'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'role_ids' => 'array|required'
        ]);

        $menu->update($request->only('name', 'url'));
        $menu->roles()->sync($request->role_ids);

        return redirect()->route('menus.index')->with('success', 'Menu updated.');
    }

    public function destroy(Menu $menu)
    {
        $menu->roles()->detach();
        $menu->delete();
        return back()->with('success', 'Menu deleted.');
    }
}

