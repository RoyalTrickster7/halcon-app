@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                    Crear Usuario
                </h2>

                <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-300">Nombre</label>
                        <input type="text" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input type="email" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="block text-sm font-medium text-gray-300">Contraseña</label>
                        <input type="password" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirmar Contraseña</label>
                        <input type="password" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="block text-sm font-medium text-gray-300">Rol</label>
                        <select class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Crear Usuario</button>
                        <a href="{{ route('admin.users.index') }}" class="inline-block px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Volver a la Lista de Usuarios</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
