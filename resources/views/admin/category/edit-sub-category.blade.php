@extends('admin.master')
@section('title')
    Settings/Brands
@endsection
@section('cssLink')
    <link rel="stylesheet" href="{{asset('adminAssets/css/sub-category.css')}}" type="text/css">
@endsection

@section('content')
    <div class="main">

        <div class="add-sub-category">
            <form action="{{route('sub-category.update', ['id' => $sub_category->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="category">
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="sub-category-name">
                    <input type="text" class="form-control" placeholder="Sub-Category name" name="sub_category_name" value="{{$sub_category->sub_category_name}}">
                </div>

                <div class="sub-category-description">
                    <textarea type="text" class="description" placeholder="Add a description" name="sub_category_description">{{$sub_category->sub_category_description}}</textarea>
                </div>
                <div class="action-buttons">
                    <button class="create" type="submit">Update</button>
                    <button class="reset" type="submit">Reset</button>
                </div>
            </form>
            <br>
            <div class="message">{{session('message')}}</div>
        </div>
    </div>
@endsection
