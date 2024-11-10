<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo',
        'regista',
        'durata',
        'descrizione',
        'immagine_copertina'
    ];

    public function programmazioni() {
        return $this->hasMany(Programmazione::class);
    }
}
