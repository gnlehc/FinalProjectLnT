<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartCtrl extends Controller
{
    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user = auth()->user();
            $product = products::find($id);
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->username = $user->Name;
            $cart->prodName = $product->prodName;
            $cart->quantity = $request->quantity;
            $cart->price = $product->Price;
            $cart->product_id = $product->id;
            $cart->save();
            return redirect()->back()->with('message', 'Added to Cart');
        }
        // else{
        //     return redirect('');
        // }
    }
    public function redirect()
    {
        $userType = Auth::user()->userType;
        if($userType == '1'){
            return view('displayProduct');
        }else{
            $data = products::paginate(3);
            $user = auth()->user();
            $count = Cart::where('user_id', $user->id)->count();
            return view('Product', compact('data', 'count'));
        }
    }

    public function showCart(){
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get(); // each user has their own cart
        $count = Cart::where('user_id', $user->id)->count();
        return view('Cart', compact('user', 'count', 'carts'));
    }

    public function deleteCart($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
}
