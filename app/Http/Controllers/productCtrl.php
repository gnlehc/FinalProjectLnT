<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;

class productCtrl extends Controller
{
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
        return redirect('displayProduct');
    }
    public function ShowCategory(){
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
}