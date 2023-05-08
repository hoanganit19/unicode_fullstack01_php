@extends('layouts/client')

@section('content')
<h1>HomeController Index</h1>
<h2>{{ $title }}</h2>
<h3>{{$subTitle ?? 'Không xác định'}}</h3>
<h3>{{strtolower('Unicode Academy')}}</h3>
<h3>{!!$content!!}</h3>

@foreach ($users as $user)
<h3>{{$user}}</h3>
@endforeach

@foreach ($products as $key => $product)
<h3>{{$key. ' - '. $product}}</h3>
@endforeach
@endsection