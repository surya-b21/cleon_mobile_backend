<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function linkedSocialAccount()
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function OauthAcessToken()
    {
        return $this->hasMany(OauthAccessToken::class);
    }

    public function sendPasswordResetNotification($token)
    {

        $url = 'http://10.0.2.2:8000/api/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'id_user');
    }
}
