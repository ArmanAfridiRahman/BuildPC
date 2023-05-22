@extends('admin.master')
@section('title')
    Settings/Brands
@endsection
@section('cssLink')
    <link rel="stylesheet" href="{{asset('adminAssets/css/brands.css')}}" type="text/css">
@endsection

@section('content')
    <div class="main">

        <div class="add-brand">
            <form action="{{route('brand.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="left">
                    <div class="brand-name">
                        <input type="text" class="form-control" placeholder="brand name" name="brand_name">
                    </div>
                    <div class="brand-picture">
                        <label>
                            Choose File
                            <input type="file" class="form-control border-gradiant" name="brand_picture">
                        </label>
                    </div>
                </div>
                <div class="brand-description">
                    <textarea type="text" class="description" placeholder="Add a description" name="brand_description"></textarea>
                </div>
                <div class="action-buttons">
                    <button class="create" type="submit">Create</button>
                    <button class="reset" type="submit">Reset</button>
                </div>
            </form>
            <br>
            <div class="message">{{session('message')}}</div>
        </div>
    </div>
    <div class="brands">
        @php $i=1 @endphp
        @foreach($brands as $brand)
            <div class="single-brand">
                <div class="brand-name"><p>{{$i++}}. </p>{{$brand->brand_name}} ({{$brand->status == 1 ? 'active' : 'Inactive'}})</div>
                <div class="brand-description">{{$brand->brand_description}}</div>

                <div class="options">
                    <button class="edit"><a href="{{route('brand.edit', ['id'=>$brand->id])}}">Edit</a></button>
                    <button class="change-status"><a href="{{route('brand.status', ['id'=>$brand->id])}}" >change status</a></button>
                    <form action="{{route('brand.delete')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$brand->id}}" name="cat_id">
                        <button class="delete" type="submit" onclick="return confirm('Delete this brand?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
