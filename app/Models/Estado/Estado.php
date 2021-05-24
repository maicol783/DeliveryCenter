<?php

namespace App\Models\Estado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados'; 
    protected $primaryKey = 'id_estado';

    public function getRouteKeyName(){
        return 'id_estado';
    }
}
