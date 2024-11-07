<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmazione extends Model
{
    use HasFactory;

    protected $table = 'programmazioni';

    protected $fillable = [
        'film_id',
        'sala_id',
        'data_inizio',
        'data_fine',
        'orario'
    ];
}
