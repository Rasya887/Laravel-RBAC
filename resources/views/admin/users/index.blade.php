<x-app-layout>
    <x-slot name="header">Master User</x-slot>

    <a href="{{ route('admin.users.create') }}" class="text-blue-500">+ Tambah User</a>

    <ul class="mt-4">
        @foreach($users as $user)
            <li class="flex justify-between">
                <span>{{ $user->name }} ({{ $user->email }}) - Role: {{ $user->roles->pluck('name')->implode(', ') }}</span>
                <div>
                    <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="text-red-500">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
