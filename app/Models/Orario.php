<?php

// App/Models/Orario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Orario extends Model
{
    use HasFactory;

    protected $table = 'orari';

    protected $fillable = [
        'programmazione_id',
        'orario',  // Assicurati che il campo orario sia un datetime
    ];

    protected $dates = [
        'orario',  // Castare il campo orario come datetime
    ];

    public function programmazione() {
        return $this->belongsTo(Programmazione::class);
    }

    public function getOrarioAttribute($value)
    {
        return Carbon::parse($value);
    }
}

