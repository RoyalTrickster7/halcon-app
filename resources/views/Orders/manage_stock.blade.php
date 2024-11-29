@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestionar Stock Faltante</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID del Producto</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad Faltante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity_missing }}</td>
                        <td>
                            <form action="{{ route('orders.manageStockOrder', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Ordenar Stock</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
