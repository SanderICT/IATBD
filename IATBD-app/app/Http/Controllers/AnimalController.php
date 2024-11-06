<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Toon de lijst van dieren.
     */
    public function index()
    {
        // Haal alle dieren op
        $animals = Animal::all();

        // Geef de dieren door aan de view
        return view('dier-oppasser', compact('animals'));
    }
}
