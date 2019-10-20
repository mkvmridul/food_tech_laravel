<?php

namespace App\Http\Controllers;

use Auth;
use App\Menu;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function order()
    {
        $ordered_menu_id = Order::where('user_id', Auth::user()->id)->pluck('menu_id');
        $items = [];
        for ($i = 0; $i < count($ordered_menu_id); $i++) {
            $items[] = Menu::where('id', $ordered_menu_id[$i])->get();
        }
        return view('user/orders', ['items' => $items]);
    }
}
