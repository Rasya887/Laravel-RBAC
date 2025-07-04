<x-app-layout>
    <x-slot name="header">{{ isset($user) ? 'Edit User' : 'Tambah User' }}</x-slot>

    <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <input type="text" name="name" value="{{ $user->name ?? '' }}" placeholder="Nama" required class="border p-2"><br>
        <input type="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Email" required class="border p-2"><br>

        @if(!isset($user))
            <input type="password" name="password" placeholder="Password" required class="border p-2"><br>
        @endif

        <select name="role_id" required class="border p-2">
            <option value="">--Pilih Role--</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ (isset($userRole) && $userRole == $role->id) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select><br>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Simpan</button>
    </form>
</x-app-layout>
