@extends('layouts/auth.master')
@section('content')
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header">
        <h3 class="text-center font-weight-light my-4">{{$pageTitle}}</h3>
    </div>
    <div class="card-body">
        {!! !empty($msg) ? '<div class="alert alert-danger">'.$msg.'</div>': '' !!}

        <form method="post">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputEmail" name="email" type="text" placeholder="name@example.com"
                    value="{{old('email')}}" />
                <label for="inputEmail">Email</label>
                <span class="text-danger">{{error('email')}}</span>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                <label for="inputPassword">Mật khẩu</label>
                <span class="text-danger">{{error('password')}}</span>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="1" name="remember" />
                <label class="form-check-label" for="inputRememberPassword"> Ghi nhớ mật khẩu</label>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="password.html">Forgot Password?</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

</div>
@endsection