<script setup>
import { Head, router } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function navigateTo(routeName) {
    router.visit(route(routeName), { preserveState: false, replace: true });
}
</script>

<template>
    <Head title="Bienvenido Profesor" />
    <div class="bg-gradient-to-r from-red-500 via-red-400 to-red-300 text-black/50 dark:bg-gradient-to-r dark:from-black dark:via-gray-800 dark:to-gray-700 dark:text-white/50">
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="py-10 lg:py-20">
                    <div class="flex flex-col items-center text-center">
                        <h1 class="text-4xl font-bold text-black dark:text-white">
                            Bienvenido al Sistema de Gestión de Pedidos
                        </h1>
                        <p class="mt-4 text-lg text-black dark:text-gray-400">
                            En esta página podrá realizar pruebas para verificar el correcto funcionamiento de todas las funcionalidades de la aplicación.
                        </p>
                    </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                        <!-- Funcionalidades del sistema -->
                        <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-900">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Funcionalidades del Sistema
                            </h2>
                            <ul class="mt-4 list-disc pl-5 text-black dark:text-gray-400">
                                <li><button @click="navigateTo('orders.index')" class="text-blue-600 underline">Consulta de Pedidos</button></li>
                                <li><button @click="navigateTo('orders.create')" class="text-blue-600 underline">Creación y Edición de Pedidos</button></li>
                                <li><button @click="navigateTo('orders.manageStock')" class="text-blue-600 underline">Gestionar Stock</button></li>
                                <li><button @click="navigateTo('admin.users.index')" class="text-blue-600 underline">Ver Usuarios y Asignar Roles</button></li>
                                <li><button @click="navigateTo('orders.showStatusForm')" class="text-blue-600 underline">Consultar Estado del Pedido</button></li>
                            </ul>
                        </div>

                        <!-- Vistas del sistema -->
                        <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-900">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Lista de Vistas Disponibles
                            </h2>
                            <ul class="mt-4 list-disc pl-5 text-black dark:text-gray-400">
                                <li><button @click="navigateTo('dashboard')" class="text-blue-600 underline">Inicio (Dashboard)</button></li>
                                <li><button @click="navigateTo('orders.index')" class="text-blue-600 underline">Pedidos (Lista de Pedidos)</button></li>
                                <li><button @click="navigateTo('orders.create')" class="text-blue-600 underline">Crear Pedido</button></li>
                                <li><button @click="navigateTo('orders.index')" class="text-blue-600 underline">Editar Pedido</button></li>
                                <li><button @click="navigateTo('orders.manageStock')" class="text-blue-600 underline">Gestionar Stock</button></li>
                                <li><button @click="navigateTo('profile.edit')" class="text-blue-600 underline">Perfil de Usuario</button></li>
                                <li><button @click="navigateTo('orders.showStatusForm')" class="text-blue-600 underline">Consulta de Estado de Pedido</button></li>
                            </ul>
                        </div>

                        <!-- Usuarios Registrados -->
                        <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-900 lg:col-span-2">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Usuarios Registrados
                            </h2>
                            <table class="w-full mt-4 table-auto border-collapse">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-zinc-700">
                                        <th class="border px-4 py-2 text-left text-black dark:text-white">Usuario</th>
                                        <th class="border px-4 py-2 text-left text-black dark:text-white">Contraseña</th>
                                        <th class="border px-4 py-2 text-left text-black dark:text-white">Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Royalyusuke@example.com</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">admin</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Admin</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">almacen@example.com</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">almacen1</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Almacen</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">compras@example.com</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">compras1</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Compras</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">ventas@example.com</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">ventas11</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Ventas</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">ruta@example.com</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">rutaruta</td>
                                        <td class="border px-4 py-2 text-black dark:text-gray-400">Ruta</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- API Information -->
                        <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-900 lg:col-span-2">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Documentación de la API
                            </h2>
                            <p class="mt-4 text-black dark:text-gray-400">
                                La API permite interactuar con el sistema de gestión de pedidos. A continuación se detallan los endpoints disponibles:
                            </p>
                            <ul class="mt-4 list-disc pl-5 text-black dark:text-gray-400">
                                <li>
                                    <strong>POST /orders</strong> - Crear un nuevo pedido.
                                    <ul class="list-disc pl-5">
                                        <li><strong>Parámetros requeridos:</strong></li>
                                        <li><code>customer_name</code>: Nombre del cliente (string).</li>
                                        <li><code>product_details</code>: Detalles del producto (string).</li>
                                        <li><code>quantity</code>: Cantidad (integer).</li>
                                    </ul>
                                </li>
                                <li>
                                    <strong>GET /orders/status</strong> - Consultar el estado de un pedido.
                                    <ul class="list-disc pl-5">
                                        <li><strong>Parámetros requeridos:</strong></li>
                                        <li><code>customer_name</code>: Nombre del cliente (string).</li>
                                        <li><code>order_id</code>: ID del pedido (integer).</li>
                                    </ul>
                                </li>
                            </ul>
                            <p class="mt-4 text-black dark:text-gray-400">
                                Para más detalles, visite la documentación completa en GitHub:
                                <a href="#" class="text-blue-600 underline">https://github.com/RoyalTrickster7/api-halcon</a> <!-- Agregar enlace de GitHub aquí -->
                            </p>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
