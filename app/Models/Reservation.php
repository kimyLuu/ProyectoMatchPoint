<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Campos rellenables
    protected $fillable = [
        'user_id', 
        'court_id', 
        'date', 
        'time', 
        'duration', 
        'status'
    ];

    // Estados posibles
    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_CANCELLED = 'cancelled';

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Court.
     */
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
