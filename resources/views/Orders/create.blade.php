@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Pedido</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="product_details" class="form-label">Detalles del Producto</label>
                <textarea class="form-control" id="product_details" name="product_details" required></textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pedido">Pedido</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="En Ruta">En Ruta</option>
                    <option value="Entregado">Entregado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Pedido</button>
        </form>
    </div>
@endsection