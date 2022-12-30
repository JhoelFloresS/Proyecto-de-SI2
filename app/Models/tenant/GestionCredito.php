<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'solicitud_id',
    ];

}
