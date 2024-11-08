<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSittingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'user_id',
        'status',  // 'pending', 'accepted', 'rejected'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Als je gebruikers hebt in je applicatie
    }
}
