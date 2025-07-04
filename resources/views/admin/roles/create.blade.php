<x-app-layout>
    <x-slot name="header">Edit Role</x-slot>

    <form action="{{ route('admin.roles.store', $role) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $role->name }}" class="border p-2" required>
        <button type="submit" class="bg-blue-500 text-black px-4 py-2">Update</button>
    </form>
</x-app-layout>
