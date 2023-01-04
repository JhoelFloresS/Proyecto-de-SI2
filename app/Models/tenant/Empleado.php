<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
