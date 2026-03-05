<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - CardSys Pro (B-Tech Group)
|--------------------------------------------------------------------------
| Mpangilio huu unahakikisha mfumo uko salama na kadi za wateja zinafunguka
| kwa kasi. Njia ya umma (/{slug}) lazima ibaki mwisho kabisa.
*/

// 1. LANDING PAGE (Inaonyesha ukurasa wa mauzo kwa Marketers)
Route::get('/', function () {
    return view('welcome');
});

// 2. NJIA YA MUDA YA KUTENGENEZA SUPER ADMIN (Epuka makosa ya terminal)
// MUHIMU: Futa au ifiche route hii baada ya kutengeneza admin wako wa kwanza.
Route::get('/tengeneza-admin', function () {
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@btech.com'],
        [
            'name' => 'B-Tech Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'super_admin'
        ]
    );
    return 'Safi sana! Admin ametengenezwa kikamilifu. Sasa nenda kwenye link ya: /login';
});

// 3. NJIA ZA LOGIN NA LOGOUT
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 4. NJIA ZA UTAWALA (PROTECTED ADMIN & CLIENT ROUTES)
Route::middleware('auth')->group(function () {
    
    // Usimamizi wa Dashboard na Kadi (Kwa Admin na Wateja)
    Route::get('/admin', [CardController::class, 'index']);
    Route::post('/cards', [CardController::class, 'store']);
    Route::delete('/cards/{id}', [CardController::class, 'destroy']);

    // Usimamizi wa Wateja/Makampuni (Kwa Super Admin Pekee)
    Route::get('/admin/clients', [ClientController::class, 'index']);
    Route::post('/admin/clients', [ClientController::class, 'store']);
    Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy']);
    
});

// 5. DOWNLOAD VCARD (SAVE TO CONTACTS)
Route::get('/vcard/{slug}', [CardController::class, 'vcard']);

// 6. PUBLIC DIGITAL CARD VIEW (LAZIMA IWE MWISHO KABISA!)
// Inachukua Link ID yoyote (mf. /jina) na kuonyesha kadi
Route::get('/{slug}', [CardController::class, 'show']);