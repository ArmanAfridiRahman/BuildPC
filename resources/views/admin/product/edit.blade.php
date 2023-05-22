@extends('admin.master')
@section('title')
    Settings/Brands
@endsection
@section('cssLink')
    <link rel="stylesheet" href="{{asset('adminAssets/css/product.css')}}" type="text/css">
@endsection

@section('content')
    <div class="create-product">
        <p>{{session('message')}}</p>
        <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="left">
                <select name="brand_id" required class="form-control">
                    <option value="" disabled selected>-- Select Product Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
                    @endforeach
                </select>
                <select name="category_id" required class="form-control">
                    <option value="" disabled selected>-- Select Product Category --</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                    @endforeach
                </select>
                <select name="sub_Category_id" required class="form-control">
                    <option value="" disabled selected>-- Select Product Sub-Category --</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{$sub_category->id}}" {{$sub_category->id == $product->sub_Category_id ? 'selected' : ''}}>{{$sub_category->sub_category_name}}</option>
                    @endforeach
                </select>

                <div class="single-picture">
                    <input type="file" class="form-control" name="image"/>
                    <img src="{{asset($product->image)}}" alt="">
                </div>
            </div>


            <div class="right">

                <div class="main">
                    <input type="text" name="product_name" id="productName" value="{{$product->product_name}}">
                    <label>
                        <div class="text">Product Name</div>
                    </label>
                </div>

                <div class="secondary">
                    <div class="two">
                        <input type="text" name="product_code" id="productCode" value="{{$product->product_code}}">
                        <label>
                            <div class="text">Product Code</div>
                        </label>
                    </div>

                    <div class="three">
                        <input type="text" name="product_stock" id="productStock" value="{{$product->product_stock}}">
                        <label>
                            <div class="text">Product Stock Amount</div>
                        </label>
                    </div>

                    <div class="four">
                        <input type="text" name="regular_price" id="regular_price" value="{{$product->regular_price}}">
                        <label>
                            <div class="text">Product Regular Price</div>
                        </label>
                    </div>

                    <div class="five">
                        <input type="text" name="selling_price" id="selling_price" value="{{$product->selling_price}}">
                        <label>
                            <div class="text">Product Selling Price</div>
                        </label>
                    </div>
                </div>

                <div class="multiple-picture">
                    <input type="file" class="form-control" name="other_image[]" multiple/>
                    <div class="images">
                        @foreach($product->otherImages as $otherImage)
                            <img src="{{asset($otherImage->image)}}" alt="">
                        @endforeach
                    </div>

                </div>
            </div>


            <div class="descriptions">
                <div class="short">
                    <textarea class="short-description" name="short_description" id="" placeholder="Add a short description">{{$product->short_description}}</textarea>
                </div>
                <div class="long">
                    <textarea class="long-description-one" name="long_field" id="" placeholder="Add a field">{{$product->long_field}}</textarea>
                    <textarea class="long-description-two" name="long_description" id="" placeholder="Add a field description">{{$product->long_description}}</textarea>
                </div>
                <div class="product-buttons">
                    <button class="create" type="submit">Update</button>
                    <button class="reset">Reset</button>
                </div>
            </div>

        </form>
    </div>
@endsection
