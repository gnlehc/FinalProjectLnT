<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
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
    // public function makeOrder(Request $request)
    // {
    //     $user = auth()->user();
    //     $user = Auth::user();
    //     $carts = Cart::where('user_id', $user->id)->get();
    //     $count = Cart::where('user_id', $user->id)->count();

    //     $order = new Order;
    //     $order->Name = $request->Name;
    //     $order->address = $request->address;
    //     $order->posCode = $request->posCode;

    //     // generate a random 8-character token and check if it's unique
    //     do {
    //         $payment_id = Str::random(12);
    //     } while (Order::where('payment_id', $payment_id)->exists());

    //     $order->payment_id = $payment_id;

    //     $order->save();

    //     return view('user', compact('order', 'user', 'carts', 'count'));

    // }

    // private function generateOrderToken()
    // {
    //     return Str::random(6);
    // }

    // $cartitems = Cart::where('user_id', Auth::id())->get();
    // foreach()

    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $items) {
            if (!products::where('id', $items->product_id)->where('Total', '>=', $items->quantity)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $items->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('Order', compact('cartItems'));
    }

    public function makeOrder(Request $request)
    {
        $user = Auth::id();
        $order = new Order();
        $order->Name = $request->Name;
        $order->address = $request->address;
        $order->posCode = $request->posCode;
        do {
            $shipping_id = Str::random(12);
        } while (Order::where('shipping_id', $shipping_id)->exists());
        $order->shipping_id = $shipping_id;
        $order->save();
        $order->id;

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $items) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $items->product_id,
                'quantity' => $items->quantity,
                'price' => $items->products->Price,
            ]);

            $prod = products::where('id', $items->product_id)->first();
            $prod->Total -= $items->quantity;
            $prod->update();
            // Remove item from cart if its quantity has been checked out
            $items->quantity -= $items->quantity;
            $items->delete();
        }
        $checkout = OrderItems::where('order_id', $order->id)->get();
        // $ordered_items = OrderItems::where('order_id', $order->id)->get();
        $count = Cart::where('user_id', $user)->count();
        return view('/user', compact('order', 'user', 'cartitems', 'count', 'checkout'));
    }

    public function showOrderDetail($orderId){
        $ordered_items = Order::find($orderId);

        return view('user', [
            'order' => $ordered_items,
        ]);
    }

}
