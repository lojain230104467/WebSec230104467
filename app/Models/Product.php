<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model  {

	protected $fillable = [
        'code',
        'name',
        'price',
        'model',
        'description',
        'photo',
        'review',
        'stock_quantity'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavoritedBy($user): bool
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function isInStock(): bool
    {
        return $this->stock_quantity > 0;
    }

    public function reduceStock(): bool
    {
        if (!$this->isInStock()) {
            return false;
        }

        $this->stock_quantity--;
        return $this->save();
    }

    public function addStock(int $quantity): bool
    {
        if ($quantity <= 0) {
            return false;
        }

        $this->stock_quantity += $quantity;
        return $this->save();
    }
}