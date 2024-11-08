<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\PetSittingRequest;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Toon de lijst van dieren met filters.
     */
    public function index(Request $request)
    {
        $query = Animal::query();

        // Controleer of er een filter is voor het type dier
        if ($request->has('animal_type') && is_array($request->animal_type)) {
            $selectedTypes = $request->animal_type;

            // Verwerk de "other" optie
            if (in_array('other', $selectedTypes)) {
                // Selecteer alle soorten behalve "dog", "cat", en "bird" als "other" geselecteerd is
                $query->whereNotIn('kind', ['dog', 'cat', 'bird']);
                // Verwijder "other" uit de geselecteerde types om dubbele filters te voorkomen
                $selectedTypes = array_diff($selectedTypes, ['other']);
            }

            // Filter de overige geselecteerde types
            if (!empty($selectedTypes)) {
                $query->whereIn('kind', $selectedTypes);
            }
        }

        // Haal de dieren op na filtering
        $animals = $query->get();

        // Geef de gefilterde dieren door aan de view
        return view('dier-oppasser', compact('animals'));
    }

    /**
     * Toon de detailpagina van een specifiek dier.
     */
    public function show($animalID)
    {
        // Zoek het dier op basis van het ID, inclusief de bijbehorende reviews
        $animal = Animal::with('reviews')->where('animalID', $animalID)->firstOrFail();

        // Toon de detailpagina van het dier
        return view('animal.show', compact('animal'));
    }

    /**
     * Verwerk de reactie van de oppas op een dierenverzoek.
     */
    public function reageren(Request $request, $animalID)
    {
        $animal = Animal::findOrFail($animalID);

        $petSittingRequest = new PetSittingRequest();
        $petSittingRequest->animal_id = $animal->animalID;
        $petSittingRequest->user_id = auth()->id();
        $petSittingRequest->status = 'pending';
        $petSittingRequest->save();

        return redirect()->route('animal.animalID', ['animalID' => $animalID])
                         ->with('status', 'Je hebt gereageerd op de oppasvraag!');
    }

    /**
     * Verwerk de acceptatie van een oppasaanvraag door de consument.
     */
    public function acceptRequest($requestID)
    {
        // Zoek de oppasaanvraag op basis van het ID
        $petSittingRequest = PetSittingRequest::findOrFail($requestID);

        // Markeer de aanvraag als geaccepteerd
        $petSittingRequest->status = 'accepted';
        $petSittingRequest->save();

        // Redirect terug naar de detailpagina van het dier met een bevestiging
        return redirect()->route('animal.animalID', ['animalID' => $petSittingRequest->animal_id])
                         ->with('status', 'Je hebt de oppasaanvraag geaccepteerd!');
    }

    /**
     * Verwerk de weigering van een oppasaanvraag door de consument.
     */
    public function rejectRequest($requestID)
    {
        // Zoek de oppasaanvraag op basis van het ID
        $petSittingRequest = PetSittingRequest::findOrFail($requestID);

        // Markeer de aanvraag als geweigerd
        $petSittingRequest->status = 'rejected';
        $petSittingRequest->save();

        // Redirect terug naar de detailpagina van het dier met een bevestiging
        return redirect()->route('animal.animalID', ['animalID' => $petSittingRequest->animal_id])
                         ->with('status', 'Je hebt de oppasaanvraag geweigerd!');
    }
}
