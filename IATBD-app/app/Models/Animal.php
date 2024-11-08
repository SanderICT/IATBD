<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';  // De naam van de tabel
    protected $primaryKey = 'animalID';  // De primaire sleutel is niet 'id', maar 'animalID'

    protected $fillable = ['name', 'age', 'kind', 'payment', 'durationInHours', 'owner', 'note', 'media'];

    public $timestamps = false;
    public function reviews()
    {
        return $this->hasMany(Review::class, 'animal_id', 'animalID');
    }
    public function media()
    {
        return $this->hasMany(AnimalMedia::class, 'animal_id');
    }
}


