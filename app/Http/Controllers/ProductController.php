<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Product::paginate(5);
        return view('admin\products\index',['cat'=>$cat]);
    }

    public function addproduct()
    {
        $categories=Category::all();
        return view('admin\products\addproduct',compact('categories'));
    }

    public function trashproduct()
    {
        //
        return view('admin\products\trashproduct');
    }

    public function storeProduct(Request $request)
    {
            $request->validate([
                'title'=>'required|unique:products,title',
                'slug'=>'required',
                'description'=>'required',
                'price'=>'required',
                'discount'=>'required',
                'thumbnail'=>'required',
            ]);
            $product=new Product;
            $product->title=$request->title;
            $product->slug=$request->slug;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->discount=$request->discount;
            $product->status=$request->status;
            $name=basename($request->thumbnail->getClientOriginalName(),$request->thumbnail->getClientOriginalExtension()).$request->thumbnail->getClientOriginalExtension();
            $product->thumbnail=$request->thumbnail->move('images',$name);
            $featured=$request->featured;
            if($featured=="on")
            {
                $product->featured=1;
            }
            else{
                $product->featured=0;
            }
            $product->save();
            $product->category()->attach($request->category_id);
            return redirect('admin/allproduct')->with('success');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
