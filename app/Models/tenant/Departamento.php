<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    # protected $connection = 'central';
    protected $table = 'departamentos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
