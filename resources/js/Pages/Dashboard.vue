<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Aquí están los props que vienen desde Laravel (DashboardController)
defineProps({
  totalOrders: Number,
  totalUsers: Number,
  isAdmin: Boolean,
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Card para Total de Pedidos -->
          <div
            class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
          >
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h3 class="text-lg font-semibold">Total de Pedidos</h3>
              <p class="text-3xl font-bold">{{ totalOrders }}</p>
              <Link
                :href="route('orders.index')"
                class="mt-2 inline-block px-4 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600"
                >Ver Pedidos</Link
              >
            </div>
          </div>

          <!-- Card para Total de Usuarios (solo visible para Admin) -->
          <div v-if="isAdmin"
            class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
          >
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h3 class="text-lg font-semibold">Total de Usuarios</h3>
              <p class="text-3xl font-bold">{{ totalUsers }}</p>
              <Link
                :href="route('admin.users.index')"
                class="mt-2 inline-block px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600"
                >Ver Usuarios</Link
              >
            </div>
          </div>

          <!-- Card para Gestionar Stock -->
          <div
            class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
          >
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h3 class="text-lg font-semibold">Gestionar Stock</h3>
              <Link
                :href="route('orders.manageStock')"
                class="mt-2 inline-block px-4 py-2 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600"
                >Gestionar Stock</Link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
