<?php

namespace App\Models\Sede;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sedes'; 
    protected $primaryKey = 'id_sede';

    public function getRouteKeyName(){
        return 'id_sede';
    }

}
