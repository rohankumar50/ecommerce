<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::paginate(5);
        return view('admin.categories.index',['cat'=>$cat]);
    }

    public function storedata()
    {
        $data=Category::select('id','title')->get();
        return view('admin.categories.create')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     **/
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
        $request->validate([
            'title'=>'required|unique:categories,title',
            'description'=>'required'
        ]);
        $category = new Category;
        $category->title=$request->title;
        $category->description = $request->description;
        $category->slug=$request->slug;
        $category->save();
        $category->children()->attach($request->parent_id);
        return redirect('admin/category')->with('success');
    }

    public function check_slug(Request $request){
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::all();
        return view('admin.categories.edit_category',['category'=>$category,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title=$request->title;
        $category->description=$request->description;
        $category->slug=$request->slug;
        $category->children()->detach();
        $category->children()->attach($request->parent_id);
        $category->save();
        return back()->with('success','data updated');
    }

    public function categoryTrash()
    {
        $cat = Category::onlyTrashed()->paginate(5);
        return view('admin/categories/categoryTrash',['cat'=>$cat]);
    }

    public function trash(Category $category)
    {
        if($category->delete()){
            return back()->with('success','data deleted');
        }
        else{
            return back()->with('success','data not deleted');
        }
    }

    public function restore($id){
        $cat=Category::onlyTrashed()->findOrFail($id);
        if($cat->restore()){
            return back()->with("success","Data successfully restored");
        }
        else{
            return back()->with("success","Data not restored");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->forceDelete()){
            return back()->with('success','data deleted');
        }
        else{
            return back()->with('success','data not deleted');
        }
    }

}
