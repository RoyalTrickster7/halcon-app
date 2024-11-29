@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pedido Creado Exitosamente</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>Su pedido ha sido registrado correctamente.</p>
        <p><strong>Número de Factura:</strong> {{ $order->id }}</p>
        <p>Por favor, conserve este número para futuras consultas sobre el estado de su pedido.</p>

        <a href="{{ route('orders.index') }}" class="btn btn-primary">Ver Lista de Pedidos</a>
    </div>
@endsection
