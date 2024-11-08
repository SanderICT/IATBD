<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationMedia extends Model
{
    use HasFactory;

    protected $table = 'location_media'; // Geef de naam van de tabel op
    public $timestamps = false; // Zet timestamps uit als je die niet gebruikt

    protected $fillable = ['location', 'media']; // Vulbare velden
}
