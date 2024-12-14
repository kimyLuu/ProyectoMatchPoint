<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];

     // Estados posibles para la pista
     public const STATUS_AVAILABLE = 'available';
     public const STATUS_OCCUPIED = 'occupied';


     public function reservations()
    {
        return $this->hasMany(Reservation::class); // Una pista puede tener muchas reservas
    }
 }

 