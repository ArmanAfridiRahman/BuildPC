@extends('admin.master')
@section('title')
    Settings/Brands
@endsection
@section('cssLink')
    <link rel="stylesheet" href="{{asset('adminAssets/css/product-manage.css')}}" type="text/css">
@endsection

@section('content')
        <div class="product-box">
            @foreach($brands as $brand)
                <div class="product-list">
                    <div class="brand">
                        <div class="brand-name"><p>{{$brand->brand_name}} ({{$brand->status == 1 ? 'active' : 'Inactive'}})</p></div>
                        <div class="brand-description">{{$brand->brand_description}}</div>
                    </div>
                    <div class="products">
                        @foreach($products as $product)
                            @if($brand->id == $product->brand_id)
                                <div class="single-product">
                                    <div class="product-name">
                                        <div class="name">
                                            <p>({{$product->status == 1 ? 'active' : 'Inactive'}})</p>
                                        </div>

                                        <div class="options">
                                            <button class="edit"><a href="{{route('product.edit', ['id'=>$product->id])}}">Edit</a></button>
                                            <button class="change-status"><a href="{{route('product.status', ['id'=>$product->id])}}" >change status</a></button>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" value="" name="cat_id">
                                                <button class="delete" type="submit" onclick="return confirm('Delete this Sub-category?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-description">
                                        <div class="long-field">{{$product->long_field}}</div>
                                        <div class="long-description">{{$product->long_description}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>


@endsection
