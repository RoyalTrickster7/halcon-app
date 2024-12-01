@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary h-100">
                    <div class="card-header">Total de Pedidos</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalOrders }}</h5>
                        <a href="{{ route('orders.index') }}" class="btn btn-light">Ver Pedidos</a>
                    </div>
                </div>
            </div>

            @role('Admin')
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success h-100">
                    <div class="card-header">Total de Usuarios</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalUsers }}</h5>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light">Ver Usuarios</a>
                    </div>
                </div>
            </div>
            @endrole

            <div class="col-md-4 mb-3">
                <div class="card text-white bg-warning h-100">
                    <div class="card-header">Gestionar Stock</div>
                    <div class="card-body">
                        <a href="{{ route('orders.manageStock') }}" class="btn btn-light">Gestionar Stock</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
