<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
</body>
</html>