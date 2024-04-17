<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_admin',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roleAdmin()
    {
        return $this->role_admin === 1;
    }
    public function orders()
    { //реализация связи между пользователем и заказами
        return $this->hasMany(Order::class);
    }
    public function setRole_adminAttribute($value)
    {  //массив атрибут в поле нью присваиваем занчение, если значение оn, то присваиваем 0, иначе 1
        $this->attributes['role_admin'] = $value === 'on' ? 1 : 0;
    }
}

