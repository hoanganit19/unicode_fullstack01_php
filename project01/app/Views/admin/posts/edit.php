@extends('layouts/admin.master')
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tiêu đề</label>
            <input type="text" name="title" class="form-control title" placeholder="Tiêu đề..."
                value="{{old('title') ?? $post['title'] }}">
            <span class="text-danger">{{error('title')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control slug" placeholder="Slug..."
                value="{{old('slug') ?? $post['slug']}}">
            <span class="text-danger">{{error('slug')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Nội dung</label>
            <textarea name="content" class="form-control ckeditor">{{old('content') ?? $post['content']}}</textarea>
            <span class="text-danger">{{error('content')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Chuyên mục</label>
            <select name="category_id" class="form-select" id="">
                <option value="">Chọn chuyên mục</option>
                @if ($categories)
                @foreach ($categories as $category)
                <option value="{{$category['id']}}"
                    {{$post['category_id'] == $category['id'] || old('category_id') == $category['id'] ? 'selected': false}}>
                    {{$category['name']}}</option>
                @endforeach
                @endif
            </select>
            <span class="text-danger">{{error('category_id')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Mô tả</label>
            <textarea name="excerpt" class="form-control"
                placeholder="Mô tả...">{{old('excerpt') ?? $post['excerpt']}}</textarea>
        </div>

        <div class="mb-3">
            <label for="">Tags</label>
            <input type="text" name="tags" class="form-control" placeholder="Tags (Mỗi tag cách nhau dấu ,)..."
                value="{{old('tags') ?? $post['tags']}}">

        </div>

        <div class="mb-3">
            <label for="">Ảnh đại diện</label>
            <div class="row ckfinder-group">
                <div class="col-6">
                    <input type="text" name="thumbnail" class="form-control ckfinder-image" placeholder="Url ảnh..."
                        value="{{old('thumbnail') ?? $post['thumbnail']}}" />
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-success choose-image">Chọn</button>
                </div>
                <div class="col-4">
                    <div class="ckfinder-preview">
                        @if (old('thumbnail') || $post['thumbnail'])
                        <img src="{{old('thumbnail') ?? $post['thumbnail']}}" alt="" style="max-width: 100%;">
                        @endif
                    </div>
                </div>
            </div>
            <span class="text-danger">{{error('thumbnail')}}</span>
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-danger back">Hủy</button>
    </form>
</div>
@endsection