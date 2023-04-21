<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeCtrl extends Controller
{
    public function redirect()
    {
        $userType = Auth::user()->userType;
        if($userType == '1'){
            return view('displayProduct');
        }else{
            $data = products::paginate(3);
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id);
            $count = Cart::where('user_id', $user->id)->count();
            return view('Product', compact('count', 'cart'));
        }
    }
}
