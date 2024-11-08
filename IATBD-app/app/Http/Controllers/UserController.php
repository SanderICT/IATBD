<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the user's profile page
    public function index()
    {
        // Fetch houses associated with the authenticated user
        $houses = Home::where('owner', Auth::id())->get();

        // Return the profile view, passing the user's houses
        return view('owner_profile', compact('houses'));
    }
}
