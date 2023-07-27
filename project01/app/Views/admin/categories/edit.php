@extends('layouts/admin.master')
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control title" placeholder="Tên..."
                value="{{old('name') ?? $category['name']}}">
            <span class="text-danger">{{error('name')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control slug" placeholder="Slug..."
                value="{{old('slug') ?? $category['slug']}}">
            <span class="text-danger">{{error('slug')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Mô tả</label>
            <textarea name="description"
                class="form-control ckeditor">{{old('description') ?? $category['description']}}</textarea>

        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-danger back">Hủy</button>
    </form>
</div>
@endsection