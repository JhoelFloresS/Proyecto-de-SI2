<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'cliente_id',
        'credito_id',
        'motivo',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function credito()
    {
        return $this->belongsTo(Credito::class, 'credito_id');
    }

    public function carpeta_credito()
    {
        return $this->hasOne(CarpetaCredito::class, 'solicitud_id');
    }

}
