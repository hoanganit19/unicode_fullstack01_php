@extends('layouts/admin.master')
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Tên..." value="{{old('name')}}">
            <span class="text-danger">{{error('name')}}</span>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{old('email')}}">
            <span class="text-danger">{{error('email')}}</span>
        </div>
        <div class="mb-3">
            <label for="">Trạng thái</label>
            <select name="status" class="form-select" id="">
                <option value="0">Chưa kích hoạt</option>
                <option value="1">Kích hoạt</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." value="">
            <span class="text-danger">{{error('password')}}</span>
        </div>

        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..."
                value="">
            <span class="text-danger">{{error('confirm_password')}}</span>
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <button type="button" class="btn btn-danger back">Hủy</button>
    </form>
</div>
@endsection