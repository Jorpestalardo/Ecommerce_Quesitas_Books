<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosPerfil extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'email',
        'password',
        'roles_id',
        'nombre',
        'apellido',
        'biografia',
        'libroPreferido',
        'img'
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    //Relacion uno a muchos: 
    public function carritos()
    {
        return $this->hasMany('App\Models\Carrito');
    }
}