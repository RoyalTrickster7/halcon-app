@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Pedido</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" required>
            </div>
            <div class="mb-3">
                <label for="product_details" class="form-label">Detalles del Producto</label>
                <textarea class="form-control" id="product_details" name="product_details" required>{{ $order->product_details }}</textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $order->quantity }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pedido" {{ $order->status == 'Pedido' ? 'selected' : '' }}>Pedido</option>
                    <option value="En Proceso" {{ $order->status == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="En Ruta" {{ $order->status == 'En Ruta' ? 'selected' : '' }}>En Ruta</option>
                    <option value="Entregado" {{ $order->status == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto (opcional)</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
        </form>
    </div>
@endsection