@extends('layouts/admin.master')
namespace App\Views\admin\pages;
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tiêu đề</label>
            <input type="text" name="title" class="form-control title" placeholder="Tiêu đề..."
                value="{{old('title') ?? $page['title']}}">
            <span class="text-danger">{{error('title')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control slug" placeholder="Slug..."
                value="{{old('slug') ?? $page['slug']}}">
            <span class="text-danger">{{error('slug')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Nội dung</label>
            <textarea name="content" class="form-control ckeditor">{{old('content') ?? $page['content']}}</textarea>
            <span class="text-danger">{{error('content')}}</span>
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-danger back">Hủy</button>
    </form>
</div>
@endsection