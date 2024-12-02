@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                        Dashboard
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Total de Pedidos -->
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h3 class="text-lg font-semibold">Total de Pedidos</h3>
                                <p class="text-3xl font-bold">{{ $totalOrders }}</p>
                                <a href="{{ route('orders.index') }}" class="mt-2 inline-block px-4 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Ver Pedidos
                                </a>
                            </div>
                        </div>

                        <!-- Total de Usuarios (Solo para Admin) -->
                        @if (auth()->user()->hasRole('Admin'))
                            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h3 class="text-lg font-semibold">Total de Usuarios</h3>
                                    <p class="text-3xl font-bold">{{ $totalUsers }}</p>
                                    <a href="{{ route('admin.users.index') }}" class="mt-2 inline-block px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">
                                        Ver Usuarios
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Gestionar Stock -->
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h3 class="text-lg font-semibold">Gestionar Stock</h3>
                                <a href="{{ route('orders.manageStock') }}" class="mt-2 inline-block px-4 py-2 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                    Gestionar Stock
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
