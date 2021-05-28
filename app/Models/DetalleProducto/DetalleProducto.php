<?php

namespace App\Models\DetalleProducto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProducto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detalle_producto';

    public function getRouteKeyName(){
        return 'id_detalle_producto';
    }
}
