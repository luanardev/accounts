<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasUuids;
    use HasRoles;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'campus',
        'status',
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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $hashed = bcrypt($password);
        $this->setAttribute('password', $hashed);
    }
	
	/**
     * Set User campus
     *
     * @param string $campus
     * @return void
     */
    public function setCampus(string $campus): void
    {
        $this->setAttribute('campus', $campus);
    }

    /**
     * Deactivate user account
     *
     * @return void
     */
    public function deactivate(): void
    {
        $this->setAttribute('status', 'Inactive');
        $this->save();
    }

    /**
     * Activate user account
     *
     * @return void
     */
    public function activate(): void
    {
        $this->setAttribute('status', 'Active');
        $this->save();
    }

    /**
     * Check whether User email exists
     *
     * @return boolean
     */
    public function emailTaken(): bool
    {
        $exists = static::where('email', $this->email)->exists();
        return (bool)$exists;
    }

    /**
     * Check whether User is deactivated
     *
     * @return boolean
     */
    public function deactivated(): bool
    {
        return strtolower($this->status) == strtolower('inactive');
    }

    /**
     * Check whether User is activated
     *
     * @return boolean
     */
    public function activated(): bool
    {
        return strtolower($this->status) == strtolower('active');
    }
	
	/**
     * @param string $email
     * @return static|null
     */
    public static function getByEmail(string $email): static|null
    {
        return static::where('email', $email)->first();
    }
	
	/**
     * @param string $campus
     * @return Collection
     */
    public static function getByCampus(string $campus): Collection
    {
        return static::where('campus', $campus)->get();
    }


}
