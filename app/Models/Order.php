<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * Definir la tabla asociada al modelo.
     */
    protected $table = 'orders';

    /**
     * Definir los atributos que son asignables.
     */
    protected $fillable = [
        'customer_name',
        'product_details',
        'quantity',
        'status',
        'photo_path', // Si se necesita actualizar la foto también
    ];

    /**
     * Definir los posibles estados de un pedido.
     */
    public const STATUS_PEDIDO = 'Pedido';
    public const STATUS_EN_PROCESO = 'En Proceso';
    public const STATUS_EN_RUTA = 'En Ruta';
    public const STATUS_ENTREGADO = 'Entregado';

    /**
     * Relación con el modelo User (asumimos que cada pedido es creado por un usuario).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Establecer valor predeterminado para el atributo `status`.
     */
    protected $attributes = [
        'status' => self::STATUS_PEDIDO,
    ];
}
