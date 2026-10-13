<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Species extends Model
{
    protected $fillable = [
        'name',
        'scientific_name',
        'habitat',
        'diet_type',
    ];

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}