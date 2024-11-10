<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'capienza'
    ];

    public function programmazioni() {
        return $this->hasMany(Programmazione::class);
    }
}
