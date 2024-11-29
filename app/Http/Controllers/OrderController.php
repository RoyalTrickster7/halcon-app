<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        // Mostrar todos los pedidos (disponible para usuarios con rol de Ventas)
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo pedido (rol de Ventas)
        return view('orders.create');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar y almacenar un nuevo pedido (rol de Ventas)
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_details' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente.');
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        // Mostrar el formulario para editar un pedido (rol de Almacén o Ventas)
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        // Actualizar el estado del pedido (roles de Almacén, Ruta o Ventas)
        $validatedData = $request->validate([
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Si el rol es Ruta y el estado es En Ruta o Entregado, permitir subir una foto
        if ($request->hasFile('photo') && ($validatedData['status'] === 'En Ruta' || $validatedData['status'] === 'Entregado')) {
            $path = $request->file('photo')->store('order_photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        // Eliminar un pedido (eliminación lógica, disponible para usuarios con rol de Ventas)
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado exitosamente.');
    }

    /**
     * Manage stock for missing items (Compras role).
     */
    public function manageStock()
    {
        // Gestionar la compra de stock faltante (rol de Compras)
        // Lógica para gestionar el stock faltante
        return view('orders.manage_stock');
    }

    public function updateStatus(Request $request, Order $order)
    {
        // Validar el estado
        $request->validate([
            'status' => 'required|string|in:Pedido,En Proceso,En Ruta,Entregado',
        ]);
    
        // Actualizar el estado del pedido
        $order->status = $request->status;
        $order->save();
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'El estado del pedido ha sido actualizado correctamente.');
    }

    public function uploadPhoto(Request $request, Order $order)
{
    // Validar la foto
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Subir la foto y almacenar la ruta
    if ($request->hasFile('photo')) {
        
        $path = $request->file('photo')->store('orders', 'public');
        $order->photo_path = $path; // El path será algo como 'orders/filename.jpg'
        $order->save();
    }

    // Redireccionar con un mensaje de éxito
    return redirect()->route('orders.index')->with('success', 'La foto ha sido subida correctamente.');
}



}
