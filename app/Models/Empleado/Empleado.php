<?php

namespace App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados'; 
    protected $primaryKey = 'documento';

    public function getRouteKeyName(){
        return 'documento';
    }


    public function sedeEmpleado(){
        return $this->belongsTo(Sede\Sede::class, 'id_sede');
    }

}
