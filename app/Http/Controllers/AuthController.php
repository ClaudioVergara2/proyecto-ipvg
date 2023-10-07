<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Arriving;
use App\Models\Vehicle;

class AuthController extends Controller
{
    public function showLogin(){
        return View('auth.login');
    }

    public function attemptLogin(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($credentials, $request?->remember)){
            $user = Auth::user();
            return redirect()->route('home')->with('user', $user);
        }else{
            return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas']);
        }
    }

    public function showRegister(){
        return View('auth.register');
    }

    public function storeAccount(Request $request){
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|integer',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function form(){
        $vehicles = Vehicle::with('arriving')->get();
        $vehiclesNotRelated = Vehicle::whereDoesntHave('arriving')->get();
        return View('admin.form')->with([
            'vehicles' => $vehicles,
            'vehiclesNotRelated' => $vehiclesNotRelated
        ]);
    }

    public function list(){
        $arrivingData = Arriving::all();
        return view('admin.list', ['arrivingMostar' => $arrivingData]);
    }
}
