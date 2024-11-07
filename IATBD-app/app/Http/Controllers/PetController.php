<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index()
    {
        // Haal de huisdieren van de ingelogde gebruiker op
        $animals = Animal::where('owner', Auth::id())->get();
        return view('mijnHuisdieren', compact('animals'));
    }

    public function create()
    {
        // Toon een formulier om een nieuw huisdier toe te voegen
        return view('maakHuisdier');
    }

    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'kind' => 'required|string',
            'payment' => 'required|numeric|between:0,999.99',
            'durationInHours' => 'required|integer',
            'note' => 'nullable|string',
        ]);

        // Sla het nieuwe huisdier op
        Animal::create([
            'name' => $request->name,
            'age' => $request->age,
            'kind' => $request->kind,
            'payment' => $request->payment,
            'durationInHours' => $request->durationInHours,
            'note' => $request->note,
            'media' => $request->media ?? '/media/Animals/Dog_Breeds.jpg',
            'owner' => Auth::id(),
        ]);

        return redirect()->route('mijnHuisdieren')->with('success', 'Huisdier succesvol toegevoegd.');
    }
}

