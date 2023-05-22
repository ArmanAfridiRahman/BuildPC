<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    private static $sub_category;

    public static function saveSubCategory($request){
        if($request->cat_id){
            self::$sub_category = Category::find($request->cat_id);
        }
        else{
            self::$sub_category = new SubCategory();
        }
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->sub_category_name = $request->sub_category_name;
        self::$sub_category->sub_category_description = $request->sub_category_description;
        self::$sub_category->save();
    }

    public static function status($id){
        self::$sub_category = SubCategory::find($id);
        if(self::$sub_category->status == 1){
            self::$sub_category->status = 0;
        }
        else{
            self::$sub_category->status = 1;
        }
        self::$sub_category->save();
    }

    public static function subCategoryDelete($request){
        self::$sub_category = SubCategory::find($request->cat_id);
        self::$sub_category->delete();
    }
    public static function updateSubCategory($request, $id){
        self::$sub_category = SubCategory::find($id);
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->sub_category_name = $request->sub_category_name;
        self::$sub_category->sub_category_description = $request->sub_category_description;
        self::$sub_category->save();
    }
}
