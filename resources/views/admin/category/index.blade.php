@extends('admin.master')
@section('title')
    Settings/Brands
@endsection
@section('cssLink')
    <link rel="stylesheet" href="{{asset('adminAssets/css/category.css')}}" type="text/css">
@endsection

@section('content')
    <div class="main">

        <div class="add-category">
            <form action="{{route('category.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="left">
                    <div class="category-name">
                        <input type="text" class="form-control" placeholder="category name" name="category_name">
                    </div>
                    <div class="category-picture">
                        <label>
                            Choose File
                            <input type="file" class="form-control border-gradiant" name="category_picture">
                        </label>
                    </div>
                </div>
                <div class="category-description">
                    <textarea type="text" class="description" placeholder="Add a description" name="category_description"></textarea>
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
    <div class="categories">
        @php $i=1 @endphp
        @foreach($categories as $category)
            <div class="single-category">
                <div class="category-name"><p>{{$i++}}. </p>{{$category->category_name}} ({{$category->status == 1 ? 'active' : 'Inactive'}})</div>
                <div class="category-description">{{$category->category_description}}</div>

                <div class="options">
                    <button class="edit"><a href="{{route('category.edit', ['id'=>$category->id])}}">Edit</a></button>
                    <button class="change-status"><a href="{{route('category.status', ['id'=>$category->id])}}" >change status</a></button>
                    <form action="{{route('category.delete')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$category->id}}" name="cat_id">
                        <button class="delete" type="submit" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
