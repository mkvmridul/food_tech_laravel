<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Order;
use Auth;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Auth::guard('restaurant')->user();
        $items = Menu::where('restaurant_id', $profile->id)->get();
        return view('restaurant.home', ['profile' => $profile, 'items' => $items]);
    }

    public function order()
    {
        $menu_id = Menu::where('restaurant_id', Auth::guard('restaurant')->user()->id)->pluck('id');
        $ordered_menu_id = Order::whereIn('menu_id', $menu_id)->pluck('menu_id');
        $items = [];
        for ($i = 0; $i < count($ordered_menu_id); $i++) {
            $items[] = Menu::where('id', $ordered_menu_id[$i])->get();
        }
        return view('restaurant/orders', ['items' => $items]);
    }
}
