<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetaCredito extends Model
{
    use HasFactory;
    protected $fillable = [
        'solicitud_id',
        'requisitos',
    ];

    public function solicitud()
    {
        return $this->belongsTo(SolicitudCredito::class, 'solicitud_id');
    }
}
