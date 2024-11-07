<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';

    protected $fillable = ['name', 'age', 'kind', 'payment', 'durationInHours', 'owner', 'note', 'media'];

    // Zet timestamps uit
    public $timestamps = false;
}

