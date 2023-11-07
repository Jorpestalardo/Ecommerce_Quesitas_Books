<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Usuario
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string|null $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUserId($value)
 * @mixin \Eloquent
 */
class Usuario extends \Illuminate\Foundation\Auth\User
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    protected $fillable = ['email', 'password', 'roles_id', 'nombre', 'apellido', 'biografia'];
    protected $hidden = ['remember_token', 'password'];

    public static function validationRules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public static function validationRulesAlerts(): array
    {
        return [
            'email.required' => 'Se solicita que ingrese un correo electrónico',
            'password.required' => 'Se solicita que ingrese una contraseña',
        ];
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'user_id');
    }
}