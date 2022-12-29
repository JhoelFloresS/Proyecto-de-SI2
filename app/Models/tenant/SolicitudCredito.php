<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'monto',
        'cliente_id',
        'credito_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function credito()
    {
        return $this->belongsTo(Credito::class, 'credito_id');
    }


}
