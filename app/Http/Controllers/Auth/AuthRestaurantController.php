<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Auth;

class AuthRestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:restaurant', ['except' => ['logout']]);
    }


    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('restaurant')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('restaurant.home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function loginForm()
    {
        return view('restaurant.login');
    }

    public function registrationForm()
    {
        return view('restaurant.register');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        Restaurant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('restaurant')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('restaurant.home'));
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('restaurant')->logout();
        return redirect('/');
    }
}
