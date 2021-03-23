<?php

namespace App\Models\Municipio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios'; 
    protected $primaryKey = 'id_municipio';

    public function getRouteKeyName(){
        return 'id_municipio';
    }
}
