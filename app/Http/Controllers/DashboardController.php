<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener información del dashboard
        $totalOrders = Order::count();
        $totalUsers = User::count();

        return Inertia::render('Dashboard', [
            'totalOrders' => $totalOrders,
            'totalUsers' => $totalUsers
        ]);
    }
}
