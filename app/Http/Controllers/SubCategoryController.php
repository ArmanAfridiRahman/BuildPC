<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.category.sub-category', [
            'categories' =>Category::all(),
            'sub_categories' => DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->get(),
        ]);
    }
    public function saveSubCategory(Request $request){
        SubCategory::saveSubCategory($request);
        if($request->cat_id){
            return redirect(route('sub-category.add'))->with('message', 'Sub-Category info were updated.');
        }
        else{
            return redirect(route('sub-category.add'))->with('message', 'Sub-Category info were saved.');
        }
    }

    public function status($id){
        SubCategory::status($id);
        return back()->with('message', 'Sub-category status info changed successfully.');
    }
    public function edit($id){
        return view('admin.category.edit-sub-category',[
           'sub_category' =>SubCategory::find($id),
            'categories' => Category::all(),
        ]);
    }

    public function subCategoryDelete(Request $request){
        SubCategory::subCategoryDelete($request);
        return back()->with('message', 'Sub Category was deleted.');
    }
    public function updateSubCategory(Request $request, $id){
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category/add')->with('message', 'Sub-Category info were updated.');
    }
}
