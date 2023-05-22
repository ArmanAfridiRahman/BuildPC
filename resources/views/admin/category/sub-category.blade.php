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
            <form action="{{route('sub-category.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="category">
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="sub-category-name">
                    <input type="text" class="form-control" placeholder="Sub-Category name" name="sub_category_name">
                </div>

                <div class="sub-category-description">
                    <textarea type="text" class="description" placeholder="Add a description" name="sub_category_description"></textarea>
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

    <div class="sub-categories">
        @foreach($categories as $category)
        <div class="sub-category-list">
            <div class="category">
                <div class="category-name"><p>{{$category->category_name}} ({{$category->status == 1 ? 'active' : 'Inactive'}})</p></div>
                <div class="category-description">{{$category->category_description}}</div>
            </div>
            <div class="sub-category">
                @foreach($sub_categories as $sub_category)
                    @if($category->id == $sub_category->category_id)
                    <div class="single-sub-category">
                        <div class="sub-category-name"><p>{{$sub_category->sub_category_name}} ({{$sub_category->status == 1 ? 'active' : 'Inactive'}})</p>
                            <div class="options">
                                <button class="edit"><a href="{{route('sub-category.edit', ['id'=>$sub_category->id])}}">Edit</a></button>
                                <button class="change-status"><a href="{{route('sub-category.status', ['id'=>$sub_category->id])}}" >change status</a></button>
                                <form action="{{route('sub-category.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$sub_category->id}}" name="cat_id">
                                    <button class="delete" type="submit" onclick="return confirm('Delete this Sub-category?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="sub-category-description">{{$sub_category->sub_category_description}}</div>
                    </div>
                   @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
@endsection
