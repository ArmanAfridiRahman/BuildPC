<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    private static $brand, $brand_picture, $imageNewName, $directory, $imgURL;

    public static function savebrand($request){
        if($request->brand_id){
            self::$brand = brand::find($request->brand_id);
        }
        else{
            self::$brand = new brand();
        }
        self::$brand->brand_name = $request->brand_name;
        self::$brand->brand_description = $request->brand_description;
        if($request->file('brand_picture')){
            if(self::$brand->brand_picture){
                if(file_exists(self::$brand->brand_picture)){
                    unlink(self::$brand->brand_picture);
                }
            }
            self::$brand->brand_picture = self::getImageUrl($request);
        }
        self::$brand->save();
    }
    private static function getImageUrl($request){
        self::$brand_picture = $request->file('brand_picture');
        self::$imageNewName=rand().'.'.self::$brand_picture->getClientOriginalExtension();
        self::$directory= 'adminAssets/brand-pictures/';
        self::$imgURL = self::$directory.self::$imageNewName;
        self::$brand_picture->move(self::$directory,self::$imageNewName);
        return self::$imgURL;
    }

    public static function status($id){
        self::$brand= brand::find($id);
        if(self::$brand->status ==1){
            self::$brand->status = 0;
        }
        else{
            self::$brand->status = 1;
        }
        self::$brand->save();
    }

    public static function brandDelete($request){
        self::$brand = brand::find($request->brand_id);
        if(self::$brand->brand_picture){
            if(file_exists(self::$brand->brand_picture)){
                unlink(self::$brand->brand_picture);
            }
        }
        self::$brand->delete();
    }

}
