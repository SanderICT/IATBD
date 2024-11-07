<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'location';  // Specificeer de tabelnaam

    // Geef aan welke velden massaal toegewezen kunnen worden
    protected $fillable = ['address', 'city', 'owner', 'media'];
}
