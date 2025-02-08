<?php

namespace App\Models;

use App\Concerns\HashableId;
use App\Contracts\HashesId;
use App\Models\Abstract\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Laravel\Sanctum\Contracts\HasApiTokens as HasApiTokensContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\Access\Authorizable;


class User extends Model implements AuthorizableContract, AuthenticatableContract, CanResetPasswordContract, MustVerifyEmailContract, HasApiTokensContract, HashesId
{
    use Authenticatable;
    use Authorizable;
    use MustVerifyEmail;
    use CanResetPassword;
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HashableId;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}
