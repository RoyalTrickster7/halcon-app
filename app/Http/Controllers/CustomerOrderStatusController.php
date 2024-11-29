<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CustomerOrderStatusController extends Controller
{
    public function showStatusForm()
    {
        // Muestra el formulario para ingresar el número de cliente y el número de factura
        return view('orders.order_status');
    }

    public function checkStatus(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_id' => 'required|integer',
        ]);

        // Buscar el pedido en base al nombre del cliente y el número de factura
        $order = Order::where('customer_name', $request->customer_name)
                      ->where('id', $request->order_id)
                      ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Pedido no encontrado. Por favor, verifica la información ingresada.');
        }

        // Retornar la vista con la información del pedido
        return view('orders.order_status', compact('order'));
    }
}