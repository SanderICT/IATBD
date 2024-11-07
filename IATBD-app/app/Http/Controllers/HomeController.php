<?php


namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Haal alle dieren op
        $Home = Home::all();

        // Geef de dieren door aan de view
        return view('dierhuizen', compact('Home'));
    }
}
