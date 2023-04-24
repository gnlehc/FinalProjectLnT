<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartCtrl extends Controller
{
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $product = products::find($id);
            $cart = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
            if ((int) $product->Total <= 0) {
                return back()->withInput()->withErrors(['quantity' => 'This Product is Out Of Stock']);
            }
            if ($cart) {
                if ($cart->quantity >= $product->Total) {
                    return back()->withInput()->withErrors(['quantity' => 'There isnt enough stock']);
                }
                $cart->increment('quantity');
            } else {
                $cart = new Cart;
                $cart->user_id = $user->id;
                $cart->username = $user->Name;
                $cart->prodName = $product->prodName;
                $cart->quantity = $request->quantity;
                $cart->price = $product->Price;
                $cart->product_id = $product->id;
                $cart->save();
            }
            return redirect()->back()->with('message', 'Added to Cart');
        }
    }
    public function redirect()
    {
        $userType = Auth::user()->userType;
        if ($userType == '1') {
            return view('displayProduct');
        } else {
            $data = products::paginate(3);
            $user = auth()->user();
            $count = Cart::where('user_id', $user->id)->count();
            return view('Product', compact('data', 'count'));
        }
    }

    public function showCart()
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get(); // each user has their own cart
        $count = Cart::where('user_id', $user->id)->count();
        return view('Cart', compact('user', 'count', 'carts'));
    }
    public function decQty($id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->where('product_id', $id)->first();

            if ($cart) {
                if ($cart->quantity > 1) {
                    $cart->decrement('quantity');
                } else {
                    $cart->delete();
                }
            }

            return redirect()->back()->with('message', 'Removed from Cart');
        }
    }
    public function deleteCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
}