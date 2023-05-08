<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Trang chủ'}}</title>
    <link rel="stylesheet" href="/clients/assets/css/style.css">
    @yield('css')
</head>

<body>

    @include('layouts/clients/header', ['subTitle' => 'abc'])
    <div class="content">
        @yield('content')
    </div>
    @include('layouts/clients/footer', ['copyright' => 'Copyright by Unicode Academy'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/clients/assets/js/script.js"></script>
    @yield('js')
</body>

</html>