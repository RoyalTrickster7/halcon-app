@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                            Crear Pedido
                        </h2>

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="customer_name" class="block text-sm font-medium text-gray-300">Nombre del Cliente</label>
                                <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="product_details" class="block text-sm font-medium text-gray-300">Detalles del Producto</label>
                                <textarea id="product_details" name="product_details" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-300">Cantidad</label>
                                <input type="number" id="quantity" name="quantity" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" min="1" required>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-300">Estado</label>
                                <select id="status" name="status" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="Pedido">Pedido</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="En Ruta">En Ruta</option>
                                    <option value="Entregado">Entregado</option>
                                </select>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Crear Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
