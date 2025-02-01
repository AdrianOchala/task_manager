<?php

namespace App\Models;

use App\Concerns\HashableId;
use App\Contracts\HashesId;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Contracts\HasApiTokens as HasApiTokensContract;
use Illuminate\Database\Eloquent\Builder;
use Database\Factories\UserFactory;
use App\Models\Abstract\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 *
 * @method static Builder<User> query()
 */
class User extends Model implements AuthorizableContract, AuthenticatableContract, CanResetPasswordContract, MustVerifyEmailContract, HasApiTokensContract, HashesId
{
    use Authenticatable;
    use Authorizable;
    use MustVerifyEmail;
    use CanResetPassword;
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HashableId;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
