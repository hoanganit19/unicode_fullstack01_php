@extends('layouts/admin.master')
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Mật khẩu cũ</label>
            <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu cũ..." value="">
            <span class="text-danger">{{error('old_password')}}</span>
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu mới</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới..." value="">
            <span class="text-danger">{{error('password')}}</span>
        </div>
        <div class="mb-3">
            <label for="">Nhập lại khẩu mới</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới..."
                value="">
            <span class="text-danger">{{error('confirm_password')}}</span>
        </div>
        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
</div>
@endsection