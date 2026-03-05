<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index() {
        // Ni Super Admin tu anaruhusiwa hapa
        if(auth()->user()->role !== 'super_admin') abort(403);
        
        $users = User::where('role', 'client')->get();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $data['name'],
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'client',
        ]);

        return back()->with('success', 'Akaunti ya kampuni imetengenezwa!');
    }
}