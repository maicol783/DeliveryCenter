<?php

namespace App\Models\DetallePedido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable = ['id_producto', 'id_pedido', 'cantidad'];
    protected $primaryKey = 'id_detalle_pedidos';

    public function getRouteKeyName(){
        return 'id_detalle_pedidos';
    }
}
