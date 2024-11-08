<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Relatie: Een review behoort tot een dier.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'animalID');
    }
}
