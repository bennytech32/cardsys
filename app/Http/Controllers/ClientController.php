<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // Onyesha orodha ya wateja (Makampuni)
    public function index()
    {
        // Ulinzi: B-Tech Admin pekee ndiye anaruhusiwa hapa
        if (Auth::user()->role !== 'super_admin') {
            abort(403, 'Huruhusiwi kuingia ukurasa huu.');
        }

        // Vuta wateja wote isipokuwa super_admin
        $clients = User::where('role', '!=', 'super_admin')->latest()->get();
        return view('admin.clients', compact('clients'));
    }

    // Tengeneza akaunti mpya ya mteja/kampuni
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'super_admin') abort(403);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client', // Hii inamfanya awe mteja wa kawaida, asione menu ya "Wateja"
        ]);

        return back()->with('success', 'Akaunti ya mteja imetengenezwa kikamilifu!');
    }

    // Futa akaunti ya mteja
    public function destroy($id)
    {
        if (Auth::user()->role !== 'super_admin') abort(403);
        
        $client = User::findOrFail($id);
        $client->delete(); // Hii itafuta na kadi zake zote kutokana na 'cascade' kwenye database

        return back()->with('success', 'Akaunti ya mteja na data zake zimefutwa.');
    }
}