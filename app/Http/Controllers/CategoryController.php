<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }
    public function saveCategory(Request $request){
        Category::saveCategory($request);
        if($request ->cat_id){
            return redirect(route('category.add'))->with('message', 'Category updated successfully');
        }
        else{
            return redirect(route('category.add'))->with('message', 'Category saved successfully');
        }
    }
    public function edit($id){
        return view('admin.category.edit-category',[
            'categories' => Category::all(),
            'category' => Category::find($id),
        ]);
    }
    public function status($id){
        Category::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function delete(Request $request){
        Category::categoryDelete($request);
        return back()->with('message', 'category deleted successfully.');
    }
}
