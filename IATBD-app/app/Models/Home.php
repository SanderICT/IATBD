<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'location';
    public $timestamps = false;

    protected $fillable = ['address', 'city', 'owner', 'media'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner', 'id');
    }


    // Relatie met location_media voor meerdere afbeeldingen
    public function media()
    {
        return $this->hasMany(LocationMedia::class, 'location', 'address');
    }

}
