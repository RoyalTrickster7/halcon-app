@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Pedidos</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Crear Pedido</a>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Detalles del Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product_details }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>

                            {{-- Formulario para actualizar el estado --}}
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm d-inline-block w-auto">
                                    <option value="Pedido" {{ $order->status == 'Pedido' ? 'selected' : '' }}>Pedido</option>
                                    <option value="En Proceso" {{ $order->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                    <option value="En Ruta" {{ $order->status == 'En Ruta' ? 'selected' : '' }}>En Ruta</option>
                                    <option value="Entregado" {{ $order->status == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar Estado</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
