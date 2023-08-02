<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>
</head>
<body>
<ul>
    <li><a href="/">welcome</a></li>
    <li><a href="/contact">contact</a></li>
    <li><a href="/hello">hello</a></li>
</ul>
@yield('content')
=======
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '라라벨 타이틀')</title>
</head>
<body>
    <li>
        <ul><a href='/'>메인</a></ul>
        <ul><a href='/contact'>contact</a></ul>
        <ul><a href='/boards'>게시판</a></ul>
    </li>
    @yield('contents')
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
</body>
</html>