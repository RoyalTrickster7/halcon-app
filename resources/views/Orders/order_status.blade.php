@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Consultar Estado de Pedido</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('orders.checkStatus') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="order_id" class="form-label">Número de Factura</label>
                <input type="number" class="form-control" id="order_id" name="order_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar Estado</button>
        </form>

        @if(isset($order))
            <div class="mt-5">
                <h3>Detalles del Pedido</h3>
                <p><strong>Estado:</strong> {{ $order->status }}</p>
                @if($order->photo_path)
                    <p><strong>Foto de Entrega:</strong></p>
                    <img src="{{ Storage::url($order->photo_path) }}" alt="Foto de Entrega" class="img-thumbnail" style="max-width: 300px;">
                @endif
            </div>
        @endif
    </div>
@endsection
