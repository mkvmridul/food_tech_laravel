<?php

namespace App\Http\Controllers;

use App\Menu;
use Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('/menus', ['menus' => $menu]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'amount' => 'required',
        ]);

        Menu::create([
            'restaurant_id' => Auth::guard('restaurant')->user()->id,
            'title' => $request->title,
            'details' => $request->details,
            'amount' => $request->amount,
            'type' => $request->type,
        ]);

        return redirect('restaurant/home');
    }
}
