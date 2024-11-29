<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

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
        'photo_path'
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
     * Mutador para el estado del pedido (por ejemplo, para convertir el estado en un formato específico).
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ucfirst($value);
    }
}
