<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'rent';

    protected $fillable = ['id', 'name', 'surname', 'lastname', 'rut', 'patent', 'email', 'fechaEntrega', 'fechaDevolucion'];

    public function vehicles () {
        return $this->belongsTo(Vehicle::class, 'patent', 'id');
    }
}
