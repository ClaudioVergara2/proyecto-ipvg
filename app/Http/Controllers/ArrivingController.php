<?php

namespace App\Http\Controllers;

use App\Models\Arriving;
use Illuminate\Http\Request;

class ArrivingController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'surname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]+$/',
            'rut' => 'required|regex:/^\d{1,8}-[\dkK]$/i',
            'email' => 'required|email',
            'patent' => 'required|exists:vehicles,id',
            'fechaEntrega' => 'required|date',
            'fechaDevolucion' => 'required|date|after_or_equal:fechaEntrega',
        ]);

        $conflict = Arriving::where('patent', $request->patent)
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
    Arriving::create([
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
    return redirect()->route('form');
    }
}
