<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Master Role
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <a href="{{ route('admin.roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            + Tambah Role
        </a>

        <ul class="space-y-2 mt-4">
            @foreach($roles as $role)
                <li class="flex items-center justify-between border-b pb-2">
                    <span>{{ $role->name }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('admin.roles.edit', $role) }}" class="text-yellow-500">Edit</a>

                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-500">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
