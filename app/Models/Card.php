<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // Tunaruhusu mfumo kupokea na kuhifadhi taarifa hizi zote
    protected $fillable = [
        'user_id', 
        'type', 
        'template', // MPYA: Kuchagua kati ya ID Badge na Business Card
        'slug', 
        'name', 
        'title', 
        'phone', 
        'email', 
        'website', 
        'color', 
        'bio', 
        'image', 
        'instagram', 
        'linkedin', 
        'tiktok'
    ];
}