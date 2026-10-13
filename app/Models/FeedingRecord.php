<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedingRecord extends Model
{
    protected $fillable = [
        'animal_id',
        'keeper_id',
        'food_type',
        'quantity',
        'fed_at',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
            'fed_at' => 'datetime',
        ];
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function keeper(): BelongsTo
    {
        return $this->belongsTo(Keeper::class);
    }
}