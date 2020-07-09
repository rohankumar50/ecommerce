<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;

class WelcomeController extends Controller
{
    public function index()
    {   
        $product=Product::all();
        return view('welcome',compact('product'));
    }

    public function singleproduct($id,$slug)
    {
        $product=Product::find($id);
        return view('webpage.product',compact('product'));
    }

    public function addtocart(Product $product, Request $request){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $qty=$request->qty?$request->qty:1;
        $cart=new Cart($oldCart);
        $cart->addProduct($product,$qty);
        Session::put('cart',$cart);
        return back()->with('message','product '.$product->title.' has been successfully added to cart');
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('webpage/cart');
        }
        $cart=Session::get('cart');
        return view('webpage/cart',compact('cart'));
    }
}
