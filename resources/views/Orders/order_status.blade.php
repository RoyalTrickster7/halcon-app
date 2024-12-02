@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                        Consultar Estado del Pedido
                    </h2>

                    @if(session('error'))
                        <div id="alert" class="fixed top-4 right-4 bg-red-500 text-white py-2 px-4 rounded shadow-lg">
                            {{ session('error') }}
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

                    <form action="{{ route('orders.checkStatus') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="customer_name" class="block text-sm font-medium text-gray-300">Nombre del Cliente</label>
                            <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="order_id" class="block text-sm font-medium text-gray-300">Número de Factura</label>
                            <input type="text" id="order_id" name="order_id" class="mt-1 block w-full bg-gray-700 text-gray-300 border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-6 flex items-center">
                            <button type="submit" class="inline-block px-4 py-2 mr-4 text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none focus:bg-green-700">Consultar Estado</button>
                            <a href="{{ route('orders.index') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Volver a Pedidos</a>
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($order))
                <div class="mt-8 overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                            Estado del Pedido: #{{ $order->id }}
                        </h3>

                        <p class="mb-2"><strong>Nombre del Cliente:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-2"><strong>Detalles del Producto:</strong> {{ $order->product_details }}</p>
                        <p class="mb-2"><strong>Cantidad:</strong> {{ $order->quantity }}</p>
                        <p class="mb-2"><strong>Estado Actual:</strong> {{ $order->status }}</p>
                        
                        @if($order->status == 'Entregado' && $order->photo_path)
                            <div class="mt-4">
                                <strong>Foto de Entrega:</strong>
                                <img src="{{ Storage::url($order->photo_path) }}" alt="Foto de Entrega" class="mt-2 w-48 h-auto object-contain rounded-md">
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
