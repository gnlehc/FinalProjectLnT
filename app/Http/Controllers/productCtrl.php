<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productCtrl extends Controller
{
    public function userProd(){
        return view('Product');
    }
    public function userCategory(){
        // $this->authorize('isAdmin');
        $categories = category::all();
        return view('Product', compact('categories'));
    }
    public function userProducts(){
        $products = products::all();
        return view('Product', compact('products'));
    }
    public function indexCategory(){
        return view('createCategory');
    }
    public function indexProd(){
        return view('createProduct');
    }

    public function storeCategory(Request $request){
        category::create([
            'categoryName' => $request->categoryName,
        ]);
        return redirect('createCategory');
    }

    public function storeProduct(Request $request){
        $request->validate([
            'image' => 'required|mimes:jpg,png'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->judul . '_' . $request->prodName . '.' . $extension;
        $request->file('image')->storeAs('/public/prodImage/', $filename);
        products::create([
            'category_id' => $request->category_id,
            'prodName' => $request->prodName,
            'Price' => $request->Price,
            'Total' => $request->Total,
            'image' => $filename,
        ]);
        return redirect('Products');
    }
    public function showCategory(){
        // $this->authorize('isAdmin');
        $categories = category::all();
        return view('createProduct', compact('categories'));
    }
    public function showProducts(){
        $products = products::all();
        return view('displayProduct', compact('products'));
    }

    public function editProd($id){
        $products = products::findOrFail($id);
        return view('editProduct', compact('products'));
    }
    public function updateProd(Request $request, $id){
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->judul . '_' . $request->prodName . '.' . $extension;
        $request->file('image')->storeAs('/public/prodImage/', $filename);
        products::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'prodName' => $request->prodName,
            'Price' => $request->Price,
            'Total' => $request->Total,
            'image' => $filename,
        ]);
        return redirect('/displayProduct');
    }
    public function deleteProd($id){
        products::destroy($id);
            return redirect('/displayProduct');
    }

    // cart

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
            $cart->save();
            return redirect()->back();
        }
        // else{
        //     return redirect('');
        // }
    }
}


