<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede\Sede;
use App\Models\Estado\Estado;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'id_sede', 'id_estado', 'documento_cliente', 'nombre_cliente',
    'apellido_cliente', 'direccion_cliente', 'telefono_cliente', 'total'];
    protected $primaryKey = 'id_pedido';

    public function getRouteKeyName(){
        return 'id_pedido';
    }

    public function sedePedido(){
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function estadoPedido(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}
