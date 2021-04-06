<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'bio',
        'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    static $roles = [
        'admin' => 'Administrateur',
        'jury' => 'Jury',
        'user' => 'Utilisateur',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return User::$roles;
    }

    public function getHashidAttribute() {
        return encodeId($this->id);
    }

    public function getNamedRoleAttribute() {
        return User::$roles[$this->role];
    }

    public function scopeJury($query) {
        return $query->where('role', 'jury');
    }
    public function scopeActive($query) {
        return $query->where('active', true);
    }
}
