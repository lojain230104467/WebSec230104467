<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasRoles;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'credit',
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
            'credit' => 'decimal:2',
        ];
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function hasEnoughCredit(float $amount): bool
    {
        return ($this->credit ?? 0) >= $amount;
    }

    public function deductCredit(float $amount): bool
    {
        if (!$this->hasEnoughCredit($amount)) {
            return false;
        }

        $this->credit -= $amount;
        return $this->save();
    }

    public function addCredit(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        $this->credit = ($this->credit ?? 0) + $amount;
        return $this->save();
    }

    public function isCustomer(): bool
    {
        return $this->hasRole('Customer');
    }

    public function isEmployee(): bool
    {
        return $this->hasRole('Employee');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }
}
