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
            'kind' => 'required|string|exists:animal_species,kind',
            'payment' => 'required|numeric|between:0,999.99',
            'durationInHours' => 'required|integer',
            'note' => 'nullable|string',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
                'kind.exists' => 'Het opgegeven soort dier is ongeldig. Kies een geldig soort uit de lijst. of schrijf het zonder hoofdletters',            
        ]);

        // Sla het nieuwe huisdier op
        $animal = Animal::create([
            'name' => $request->name,
            'age' => $request->age,
            'kind' => $request->kind,
            'payment' => $request->payment,
            'durationInHours' => $request->durationInHours,
            'note' => $request->note,
            'owner' => Auth::id(),
        ]);

        // Controleer of er een afbeelding is geüpload
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            
            // Bewaar de afbeelding en sla het pad op
            $path = $image->store('media/Animals', 'public');
            
            // Werk het animal record bij met het pad naar de afbeelding
            $animal->update([
                'media' => 'storage/' . $path, // Het pad naar de afbeelding wordt opgeslagen in de database
            ]);
        }

        // Redirect na succesvolle opslag
        return redirect()->route('mijnHuisdieren')->with('success', 'Huisdier succesvol toegevoegd.');
    }


}

