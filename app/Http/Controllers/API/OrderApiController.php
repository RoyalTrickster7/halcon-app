<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderApiController extends Controller
{
    // Crear un pedido
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_details' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Agregar el estado predeterminado "Pedido"
        $validatedData['status'] = Order::STATUS_PEDIDO;

        $order = Order::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Pedido creado exitosamente.',
            'order' => $order
        ]);
    }

    // Consultar el estado de un pedido
    public function checkStatus(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_id' => 'required|integer',
        ]);

        $order = Order::where('customer_name', $validatedData['customer_name'])
            ->where('id', $validatedData['order_id'])
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pedido no encontrado. Verifica la información ingresada.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'order' => [
                'id' => $order->id,
                'customer_name' => $order->customer_name,
                'status' => $order->status,
                'product_details' => $order->product_details,
                'quantity' => $order->quantity,
            ]
        ]);
    }
}
