<?php


namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Haal alle dieren op
        $animals = Animal::all();

        // Geef de dieren door aan de view
        return view('dierhuizen', compact('animals'));
    }
}
