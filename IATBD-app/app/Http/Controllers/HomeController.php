<?php


namespace App\Http\Controllers;

use App\Models\LocationMedia;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Haal alle huizen op
        $home = Home::all();

        return view('dierhuizen', compact('home'));
    }
    public function show($address)
    {
        // Haal alle media op voor een specifiek adres
        $media = LocationMedia::where('location', $address)->get();

        if ($media->isEmpty()) {
            return abort(404);  // Geen media gevonden
        }

        // Haal de huisgegevens op (bijvoorbeeld eigenaar, stad)
        $home = Home::where('address', $address)->first();

        return view('huisdetail', compact('home', 'media'));
    }

    public function create()
    {
        return view('create'); // Pad aangepast naar 'create' in plaats van 'home.create'
    }

    // Opslaan van het huis
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255|unique:location',
            'city' => 'required|string|max:255',
            'media' => 'required|array', // Zorg ervoor dat het een array is
            'media.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048', // Validatie voor afbeeldingen (webp wordt niet geaccepteerd)
        ], [
            'media.*.mimes' => 'Alleen jpeg, png, jpg, gif, en svg afbeeldingen zijn toegestaan.', // Aangepaste foutmelding voor bestandstype
        ]);

        try {
            
            $firstImage = $request->file('media')[0];
            $firstImagePath = $firstImage->store('media/Locations', 'public');

            // Maak het huis aan
            $home = Home::create([
                'address' => $request->address,
                'city' => $request->city,
                'owner' => Auth::id(),
                'media' => 'storage/' . $firstImagePath
            ]);

            // Sla de bijbehorende media op
            if ($request->has('media')) {
                foreach ($request->media as $image) {
                    // Bewaar de afbeeldingen
                    $path = $image->store('media/Locations', 'public');
                    
                    LocationMedia::create([
                        'location' => $home->address,
                        'media' => 'storage/' . $path
                    ]);
                    
                }
            }

            return redirect('/dashboard')->with('status', 'Huis succesvol toegevoegd!');
        } catch (\Exception $e) {
            return redirect()->route('home.create')->with('error', 'Er is een fout opgetreden bij het aanmaken van het huis: ' . $e->getMessage());
        }
        
    }
}



