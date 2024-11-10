<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmazione extends Model
{
    use HasFactory;

    protected $table = 'programmazioni'; // Nome della tabella
    protected $primaryKey = 'id';       // Assicurati che la chiave primaria sia corretta
    public $timestamps = true;

    protected $fillable = [
        'film_id',
        'sala_id',
        'data_inizio',
        'data_fine'
    ];

    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function sala() {
        return $this->belongsTo(Sala::class);
    }

    public function orari() {
        return $this->hasMany(Orario::class);
    }
}
