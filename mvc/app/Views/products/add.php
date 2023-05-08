@extends('layouts/client')

@section('content')
<form action="{{route('products-post')}}" method="post">
    <div>
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name..." value="{{old('name')}}" /> <br />
        <span style="color: red">{{error('name')}}</span>
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Email..." value="{{old('email')}}" /> <br />
        <span style="color: red">{{error('email')}}</span>
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password..." /> <br />
        <span style="color: red">{{error('password')}}</span>
    </div>
    <div>
        <label for="">Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password..." /> <br />
        <span style="color: red">{{error('confirm_password')}}</span>
    </div>
    <button type="submit">Submit</button>
</form>
@endsection

@section('js')
<script>
console.log('abc');
</script>
@endsection

@section('css')
<style>
h1 {
    color: red;
}
</style>
@endsection