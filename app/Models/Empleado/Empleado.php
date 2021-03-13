<?php

namespace App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;

class Empleado extends Model
{
    use HasFactory;
    protected $primaryKey = 'documento';

    public function getRouteKeyName(){
        return 'documento';
    }

    public function rolEmpleado(){
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function sedeEmpleado(){
        return $this->belongsTo(Sede\Sede::class, 'id_sede');
    }

}
