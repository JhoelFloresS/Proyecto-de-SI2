<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'fecha',
        'ip_maquina',
        'users_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
