<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arriving extends Model
{
    use HasFactory;

    protected $table = 'arriving';

    protected $fillable = ['id', 'name', 'surname','lastname','rut', 'patent', 'email', 'fechaEntrega', 'fechaDevolucion'];

    public function vehicles () {
        return $this->belongsTo(Vehicle::class, 'patent', 'patent');
    }
}
