<header>
    <h1>HEADER</h1>
    <p>
        Chào bạn: {{!empty($user['name']) ? $user['name']: ''}}
    </p>
    <h2>{{$subTitle}}</h2>
    <h3>{{$title}}</h3>
    <h3>Info: {{$info}}</h3>
</header>