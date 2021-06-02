<?php

namespace App\Models\EntradaProducto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede\Sede;
use App\Models\Producto\Producto;

class EntradaProducto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_entrada_producto';

    public function getRouteKeyName(){
        return 'id_entrada_producto';
    }

    public function sedeEntrada(){
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function productoEntrada(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
