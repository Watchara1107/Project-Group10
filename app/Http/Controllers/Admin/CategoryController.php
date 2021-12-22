<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.addservice');
    }

    public function insert(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('index.category');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        return redirect()->route('index.category');

    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('index.category');

    }
}
