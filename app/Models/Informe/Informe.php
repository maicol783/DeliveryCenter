<?php

namespace App\Models\Informe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_informe';

    public function getRouteKeyName(){
        return 'id_informe';
    }
}
