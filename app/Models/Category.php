<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $category_picture, $imageNewName, $directory, $imgURL;

    public static function saveCategory($request){
        if($request->cat_id){
            self::$category = Category::find($request->cat_id);
        }
        else{
            self::$category = new Category();
        }
        self::$category->category_name = $request->category_name;
        self::$category->category_description = $request->category_description;
        if($request->file('category_picture')){
            if(self::$category->category_picture){
                if(file_exists(self::$category->category_picture)){
                    unlink(self::$category->category_picture);
                }
            }
            self::$category->category_picture = self::getImageUrl($request);
        }
        self::$category->save();
    }
    private static function getImageUrl($request){
        self::$category_picture = $request->file('category_picture');
        self::$imageNewName=rand().'.'.self::$category_picture->getClientOriginalExtension();
        self::$directory= 'adminAssets/category-pictures/';
        self::$imgURL = self::$directory.self::$imageNewName;
        self::$category_picture->move(self::$directory,self::$imageNewName);
        return self::$imgURL;
    }

    public static function status($id){
        self::$category= Category::find($id);
        if(self::$category->status ==1){
            self::$category->status = 0;
        }
        else{
            self::$category->status = 1;
        }
        self::$category->save();
    }

    public static function categoryDelete($request){
        self::$category = Category::find($request->cat_id);
        if(self::$category->category_picture){
            if(file_exists(self::$category->category_picture)){
                unlink(self::$category->category_picture);
            }
        }
        self::$category->delete();
    }

}
