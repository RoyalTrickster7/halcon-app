@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                        Editar Usuario
                    </h2>

                    @if(session('success'))
                        <div id="alert" class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded shadow-lg">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                const alertBox = document.getElementById('alert');
                                if (alertBox) {
                                    alertBox.style.display = 'none';
                                }
                            }, 3000);
                        </script>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3">
                            <label for="name" class="block text-sm font-medium text-gray-300">Nombre</label>
                            <input type="text" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                            <input type="email" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="block text-sm font-medium text-gray-300">Rol</label>
                            <select class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" id="role" name="role" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->getRoleNames()->first() == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Actualizar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
