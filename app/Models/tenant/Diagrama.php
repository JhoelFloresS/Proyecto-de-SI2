<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagrama extends Model
{
    use HasFactory;

    protected $table = 'diagramas';
    protected $fillable = [
        'nombre',
        'json'
    ];

}