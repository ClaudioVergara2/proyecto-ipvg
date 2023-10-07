<?php

namespace App\Http\Controllers;

use App\Models\Arriving;
use Illuminate\Http\Request;

class ArrivingController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'lastname' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'patent' => 'required|exists:arriving,patent',
            'fechaEntrega' => 'required',
            'fechaDevolucion' => 'required'
        ]);
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


    public function delete($id){
        $vehicle = Arriving::find($id);
        $vehicle->delete();
        return redirect()->route('home');
    }
}
