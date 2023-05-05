<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <header>
        <h1>HEADER</h1>
    </header>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        <h1>FOOTER</h1>
    </footer>
</body>

</html>