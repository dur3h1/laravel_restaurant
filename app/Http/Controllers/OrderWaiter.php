<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderWaiter extends Controller
{
    public $totalprice = 0;

    public function ViewOrder(){
        $carts = Cart::get();
        $cart_prod_id = Cart::where('id')->get();
        $products = Product::get();
        return view('restaurant.Order', compact('products', 'carts', 'cart_prod_id'));
    }

    public function addToCartbtn($id){
        $Not_product = Product::findOrFail($id);
        return view('restaurant.Order', compact('Not_product'));
    }

    public function addProductAjax(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_check = Product::where('id', $product_id)->first();
        // dd($product_check);
        if($product_check)
        {
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                return response()->json(['status' => $product_check->name ." Already added to Cart"]);
            }
            else
            {
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->product_qty = $product_qty;
                $cartItem->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status' => $product_check->name." Added to Cart"]);
            }

        }

    }

    public function delete($id)
    {
        $product_in_cart = Cart::findOrFail($id);

        $product_in_cart->delete();
        return redirect()->back();
    }

}
