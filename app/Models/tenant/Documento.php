<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Documento extends Model
{
    use HasFactory;

    //use MediaAlly;

    protected $fillable = [
        'archivo_url',
        'public_id',
        'descripcion',
        'fecha_hora',
        'formato',
        'estado',
        'carpeta_id',
    ];

}
