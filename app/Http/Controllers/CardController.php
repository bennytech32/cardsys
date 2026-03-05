<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    /**
     * 1. DASHBOARD: Onyesha kadi zote
     */
    public function index()
    {
        // Kama wewe ni B-Tech Admin (super_admin), unaona kadi zote kwenye mfumo.
        // Kama ni mteja wa kawaida, anaona kadi alizotengeneza yeye tu.
        if (Auth::user()->role === 'super_admin') {
            $cards = Card::latest()->get(); 
        } else {
            $cards = Card::where('user_id', Auth::id())->latest()->get();
        }

        return view('admin.dashboard', compact('cards'));
    }

    /**
     * 2. HIFADHI KADI MPYA (Store)
     */
    public function store(Request $request)
    {
        // 1. Hakiki taarifa zilizoingizwa kwenye fomu
        $data = $request->validate([
            'type' => 'required|in:individual,institution',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:cards,slug',
            'title' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'color' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. AMBATANISHA KADI NA ADMIN ALIYEITENGENEZA (Hii ndio inafanya kadi ionekane Dashboard)
        $data['user_id'] = Auth::id();

        // 3. Hifadhi picha kama ipo
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cards', 'public');
        }

        // 4. Ingiza kwenye Database
        Card::create($data);

        // 5. Rudisha majibu kwenye Dashboard
        return back()->with('success', 'Kadi ya ' . $request->name . ' imetengenezwa kikamilifu!');
    }

    /**
     * 3. ONYESHA KADI YA UMMA (Public Digital Card View)
     */
    public function show($slug)
    {
        // Tafuta kadi kwa kutumia Link ID (Slug). Ikiikosa, itarudisha kosa la 404 badala ya kuharibu mfumo.
        $card = Card::where('slug', $slug)->firstOrFail();
        
        return view('card.public', compact('card'));
    }

    /**
     * 4. PAKUA VCARD (Save to Contacts)
     */
    public function vcard($slug)
    {
        $card = Card::where('slug', $slug)->firstOrFail();

        // Tengeneza muundo wa faili la mawasiliano la simu
        $vcf = "BEGIN:VCARD\nVERSION:3.0\n";
        $vcf .= "FN:" . $card->name . "\n";
        
        if ($card->title) $vcf .= "TITLE:" . $card->title . "\n";
        if ($card->phone) $vcf .= "TEL;TYPE=CELL:" . $card->phone . "\n";
        if ($card->email) $vcf .= "EMAIL:" . $card->email . "\n";
        
        $vcf .= "END:VCARD";

        return response($vcf)
            ->header('Content-Type', 'text/vcard')
            ->header('Content-Disposition', 'attachment; filename="' . $card->slug . '.vcf"');
    }

    /**
     * 5. FUTA KADI (Delete)
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        
        // Ulinzi: Hakikisha anayefuta ni mmiliki wa kadi au Super Admin
        if (Auth::user()->role !== 'super_admin' && $card->user_id !== Auth::id()) {
            abort(403);
        }

        // Futa picha kwenye storage kama ipo
        if ($card->image) {
            Storage::disk('public')->delete($card->image);
        }
        
        $card->delete();

        return back()->with('success', 'Kadi imefutwa kikamilifu kwenye mfumo.');
    }
}