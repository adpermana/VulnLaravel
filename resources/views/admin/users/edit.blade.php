@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Edit User</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Role</label>
            <select name="role" class="w-full px-3 py-2 border rounded-lg">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection
