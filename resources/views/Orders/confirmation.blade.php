@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                            Confirmación del Pedido
                        </h2>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-300 mb-2">Detalles del Pedido</h3>
                            <p><strong>ID del Pedido:</strong> {{ $order->id }}</p>
                            <p><strong>Nombre del Cliente:</strong> {{ $order->customer_name }}</p>
                            <p><strong>Detalles del Producto:</strong> {{ $order->product_details }}</p>
                            <p><strong>Cantidad:</strong> {{ $order->quantity }}</p>
                            <p><strong>Estado:</strong> {{ $order->status }}</p>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('orders.index') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                Volver a la Lista de Pedidos
                            </a>
                            <a href="{{ route('orders.edit', $order->id) }}" class="inline-block px-4 py-2 ml-4 text-white bg-yellow-600 rounded hover:bg-yellow-700 focus:outline-none focus:bg-yellow-700">
                                Editar Pedido
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
