@extends('layouts/admin.master')
@section('content')
<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Tên..."
                value="{{old('name') ?? $user->name}}">
            <span class="text-danger">{{error('name')}}</span>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Tên..."
                value="{{old('email') ?? $user->email}}">
            <span class="text-danger">{{error('email')}}</span>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection