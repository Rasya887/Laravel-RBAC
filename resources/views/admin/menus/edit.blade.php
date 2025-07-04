<x-app-layout>
    <x-slot name="header">{{ isset($menu) ? 'Edit Menu' : 'Tambah Menu' }}</x-slot>

    <form action="{{ isset($menu) ? route('admin.menus.update', $menu) : route('admin.menus.store') }}" method="POST">
        @csrf
        @if(isset($menu)) @method('PUT') @endif

        <input type="text" name="name" value="{{ $menu->name ?? '' }}" placeholder="Nama Menu" class="border p-2" required><br>
        <input type="text" name="url" value="{{ $menu->url ?? '' }}" placeholder="URL" class="border p-2"><br>

        <label>Pilih Role yang bisa lihat menu:</label><br>
        @foreach($roles as $role)
            <label>
                <input type="checkbox" name="role_ids[]" value="{{ $role->id }}"
                {{ (isset($menuRoles) && in_array($role->id, $menuRoles)) ? 'checked' : '' }}>
                {{ $role->name }}
            </label><br>
        @endforeach

        <button type="submit" class="bg-blue-500 text-black px-4 py-2 mt-2">Simpan</button>
    </form>
</x-app-layout>
