<?php

namespace App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles'; 
    protected $primaryKey = 'id_rol';

    public function getRouteKeyName(){
        return 'id_rol';
}
}