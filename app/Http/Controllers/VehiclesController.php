<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Rent;

class VehiclesController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'patent' => 'required|min:6|max:8|unique:vehicles,patent',
            'year' => 'required|min:4|max:4',
            'brand' => 'required',
            'model' => 'required'
        ]);
        Vehicle::create([
            'category_id' => $request->category_id,
            'patent' => $request->patent,
            'year' => $request->year,
            'brand' => $request->brand,
            'model' => $request->model
        ]);
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $rent = Rent::find($id);
        if (!$rent) {
            return redirect()->route('listado');
        }
        $rent->delete();
        return redirect()->route('listado');
    }
}
