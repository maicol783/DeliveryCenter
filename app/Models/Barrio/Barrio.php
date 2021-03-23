<?php

namespace App\Models\Barrio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    use HasFactory;
    protected $table = 'barrios'; 
    protected $primaryKey = 'id_barrio';

    public function getRouteKeyName(){
        return 'id_barrio';
    }
}
