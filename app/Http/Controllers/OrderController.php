<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index()
    {
        // Mostrar todos los pedidos (disponible para usuarios con rol de Ventas)
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo pedido (rol de Ventas)
        return view('orders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validar y almacenar un nuevo pedido (rol de Ventas)
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_details' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
        ]);

        $order = Order::create($validatedData);

        return redirect()->route('orders.confirmation', $order->id)->with('success', 'Pedido creado exitosamente. Número de Factura: ' . $order->id);
    }

    public function confirmation(Order $order)
    {
        return view('orders.confirmation', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_details' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
        ]);
    
        // Registrar para verificar si llega aquí
        \Log::info('Datos recibidos para actualizar el pedido:', $validatedData);
    
        // Actualizar el pedido con los datos validados
        $order->update($validatedData);
    
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado exitosamente.');
    }
    

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado exitosamente.');
    }

    public function manageStock()
    {
       
        $stockItems = [];
        
        return view('orders.manage_stock', compact('stockItems'));
    }
    

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'El estado del pedido ha sido actualizado correctamente.');
    }

    public function uploadPhoto(Request $request, Order $order)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('orders', 'public');
            $order->photo_path = $path;
            $order->save();
        }

        return redirect()->route('orders.index')->with('success', 'La foto ha sido subida correctamente.');
    }
}
