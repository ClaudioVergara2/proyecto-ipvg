<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rent;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $authenticated_user = Auth::user();
        // dd($categories);
        $categories = Category::with('vehicles')->orderBy('id', 'desc')->get();
        $rent = Rent::with('vehicles')->get();
        $vehicles = Vehicle::with('rent')->get();
        return View('admin.home')->with([
            'user' => $authenticated_user,
            'categories' => $categories,
            'rent' => $rent,
            'vehicles' => $vehicles
        ]);
        /// los select aca
    }
}
