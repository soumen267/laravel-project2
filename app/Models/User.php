<?php

namespace App\Models;

use App\Helper\Tokenable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
//implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, Cachable, Tokenable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function canAccessFilament(): bool
    // {
    //     return str_ends_with($this->email, '@admin.com') && $this->hasVerifiedEmail();
    // }

    public function rating()
    {
        return $this->hasMany(App\Models\Rating::class, 'user_id', 'id');
    }

    public function saveUser($request) : self
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->save();

        return $this;
    }
}
