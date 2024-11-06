<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';  // Specificeer de tabelnaam

    // Geef aan welke velden massaal toegewezen kunnen worden
    protected $fillable = ['name', 'age', 'kind', 'payment', 'durationInHours',  'owner', 'note'];
}
