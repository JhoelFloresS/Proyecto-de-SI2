<?php

namespace App\Models\tenant;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    # protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $table = 'database\migrations\tenant\users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'telefono',
        'departamentos_id',
    ];

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }


}
