<?php

namespace App\Http\Controllers;

use App\Models\Arriving;
use App\Models\Rent;
use Illuminate\Http\Request;

class ArrivingController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'surname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'rut' => 'required|regex:/^\d+\-[0-9kK]$/i|unique:arriving,rut',
            'email' => 'required|email',
            'patent' => 'required|exists:vehicles,id',
            'fechaEntrega' => 'required|date_format:Y-m-d',
            'fechaDevolucion' => 'required|date_format:Y-m-d|after_or_equal:fechaEntrega',
        ]);

        $conflict = Rent::where('patent', $request->patent)
        ->where(function ($query) use ($request) {
            $query->whereBetween('fechaEntrega', [$request->fechaEntrega, $request->fechaDevolucion])
                ->orWhereBetween('fechaDevolucion', [$request->fechaEntrega, $request->fechaDevolucion]);
        })
        ->exists();
        if ($conflict) {
            return redirect()->route('formulario')
            ->withErrors(['fechaEntrega' => 'Las fechas coinciden con otro arriendo.'])
            ->withInput();
    }
    Rent::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'lastname' => $request->lastname,
        'rut' => $request->rut,
        'email' => $request->email,
        'patent' => $request->patent,
        'fechaEntrega' => $request->fechaEntrega,
        'fechaDevolucion' => $request->fechaDevolucion
    ]);
    return redirect()->route('home');
    }
}
