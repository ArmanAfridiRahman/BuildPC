<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'adminAssets/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }
    public static function status($id){
        self::$product = Product::find($id);
        if(self::$product->status == 1){
            self::$product->status = 0;
        }
        else{
            self::$product->status = 1;
        }
        self::$product->save();
    }

    public static function newProduct($request){
        self::$product = new Product();
        self::$product->brand_id = $request->brand_id;
        self::$product->category_id = $request->category_id;
        self::$product->sub_Category_id = $request->sub_Category_id;
        self::$product->image = self::getImageUrl($request);
        self::$product->product_name = $request->product_name;
        self::$product->product_code = $request->product_code;
        self::$product->product_stock = $request->product_stock;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_field = $request->long_field;
        self::$product->long_description = $request->long_description;
        self::$product->save();
        return self::$product;

    }


    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function otherImages(){
        return $this->hasMany(OtherImage::class);
    }

    public static function updateProductInfo($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }
        self::$product->brand_id = $request->brand_id;
        self::$product->category_id = $request->category_id;
        self::$product->sub_Category_id = $request->sub_Category_id;
        self::$product->image = self::$imageUrl;
        self::$product->product_name = $request->product_name;
        self::$product->product_code = $request->product_code;
        self::$product->product_stock = $request->product_stock;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_field = $request->long_field;
        self::$product->long_description = $request->long_description;
        self::$product->save();
    }

    public static function deleteProduct($id){
        self::$product = Product::find($id);
        if(file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

}
