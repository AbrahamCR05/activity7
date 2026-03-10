<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'group_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user belongs to a role (student, teacher, admin).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * A user (student) belongs to a group.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
