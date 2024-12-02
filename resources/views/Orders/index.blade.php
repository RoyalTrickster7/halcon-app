@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 dark:bg-gray-900 min-h-screen py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-100 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                        Lista de Pedidos
                    </h2>

                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('orders.create') }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                            Crear Pedido
                        </a>
                        <a href="{{ route('orders.showStatusForm') }}" class="inline-block px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none focus:bg-green-700">
                            Consultar Estado de Pedido
                        </a>
                    </div>

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

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 table-auto">
                            <thead class="bg-gray-700 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nombre del Cliente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Detalles del Producto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Cantidad</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Foto de Entrega</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-100">{{ $order->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-100">{{ $order->customer_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-100">{{ $order->product_details }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-100">{{ $order->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-100">{{ $order->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($order->photo_path)
                                                <img src="{{ Storage::url($order->photo_path) }}" alt="Foto de Entrega" class="w-48 h-auto object-contain rounded-md cursor-pointer" onclick="openModal('{{ Storage::url($order->photo_path) }}')">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-400 hover:text-indigo-500">Editar</a>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-500">Eliminar</button>
                                            </form>
                                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm d-inline-block w-auto mt-2 text-sm dark:bg-gray-700 dark:text-gray-200">
                                                    <option value="Pedido" {{ $order->status == 'Pedido' ? 'selected' : '' }}>Pedido</option>
                                                    <option value="En Proceso" {{ $order->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                                    <option value="En Ruta" {{ $order->status == 'En Ruta' ? 'selected' : '' }}>En Ruta</option>
                                                    <option value="Entregado" {{ $order->status == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                                </select>
                                                <button type="submit" class="inline-block px-4 py-1 text-white bg-green-600 rounded mt-2 hover:bg-green-700 focus:outline-none focus:bg-green-700">Actualizar</button>
                                            </form>
                                            @if($order->status == 'En Ruta' || $order->status == 'Entregado')
                                                <form action="{{ route('orders.uploadPhoto', $order->id) }}" method="POST" enctype="multipart/form-data" class="inline-block ml-2 mt-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="file" name="photo" class="form-control-file d-inline-block w-auto mb-2 text-sm dark:bg-gray-700 dark:text-gray-200" required>
                                                    <button type="submit" class="inline-block px-4 py-1 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Subir Foto</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('photoModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('photoModal').classList.add('hidden');
    }
</script>

<div id="photoModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden">
    <div class="bg-white p-4 rounded-lg max-w-full max-h-full overflow-auto">
        <img id="modalImage" src="" alt="Foto de Entrega" class="max-w-full max-h-screen h-auto">
        <button onclick="closeModal()" class="mt-4 px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:bg-red-700">Cerrar</button>
    </div>
</div>
