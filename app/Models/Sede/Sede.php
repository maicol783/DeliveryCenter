<?php

namespace App\Models\Sede;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barrio\Barrio;
use App\Models\Municipio\Municipio;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sedes'; 
    protected $primaryKey = 'id_sede';

    public function getRouteKeyName(){
        return 'id_sede';
    }

    public function barrioSede(){
        return $this->belongsTo(Barrio::class, 'id_barrio');
    }

    public function municipioSede(){
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

}
