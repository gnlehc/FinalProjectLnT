<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderCtrl extends Controller
{
    public function indexOrder()
    {
        return view('Order');
    }
    public function makeOrder(Request $request)
    {
        $user = auth()->user();
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        $count = Cart::where('user_id', $user->id)->count();

        $order = new Order;
        $order->Name = $request->Name;
        $order->address = $request->address;
        $order->posCode = $request->posCode;

        // generate a random 8-character token and check if it's unique
        do {
            $payment_id = Str::random(8);
        } while (Order::where('payment_id', $payment_id)->exists());

        $order->payment_id = $payment_id;

        $order->save();

        return view('user', compact('order', 'user', 'carts', 'count'));

    }

    private function generateOrderToken()
    {
        return Str::random(6);
    }
}
