<x-app-layout>
    <x-slot name="header">Master Menu</x-slot>

    <a href="{{ route('admin.menus.create') }}" class="text-blue-500">+ Tambah Menu</a>

    <ul class="mt-4">
        @foreach($menus as $menu)
            <li class="flex justify-between">
                <span>{{ $menu->name }} ({{ $menu->url }}) - Untuk: {{ $menu->roles->pluck('name')->implode(', ') }}</span>
                <div>
                    <a href="{{ route('admin.menus.edit', $menu) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="text-red-500">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
