<?php

namespace App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede\Sede;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto';

    public function getRouteKeyName(){
        return 'id_producto';
    }

    public function sedeProducto(){
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    
}
