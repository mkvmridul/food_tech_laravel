<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'menu_id' => 'required',
        ]);
        Order::create([
            'user_id' => Auth::guard('web')->user()->id,
            'menu_id' => $request->menu_id
        ]);

        return redirect('user/orders');
    }
}
