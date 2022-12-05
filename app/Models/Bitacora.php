<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacoras';
    protected $fillable = [
        'accion',
        'fecha',
        'fecha_server',
        'ip_maquina',
        'users_id',
        'tenants_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
