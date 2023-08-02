<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
</body>
</html>