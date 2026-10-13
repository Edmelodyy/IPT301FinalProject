<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keeper extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
    ];

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function feedingRecords(): HasMany
    {
        return $this->hasMany(FeedingRecord::class);
    }
}