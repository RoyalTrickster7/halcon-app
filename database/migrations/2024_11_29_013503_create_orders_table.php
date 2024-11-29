<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->text('product_details');
            $table->integer('quantity');
            $table->string('status');
            $table->string('photo_path')->nullable(); // Foto opcional para 'En Ruta' y 'Entregado'
            $table->timestamps();
            $table->softDeletes(); // Para la eliminación lógica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
