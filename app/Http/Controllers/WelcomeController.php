<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
}
