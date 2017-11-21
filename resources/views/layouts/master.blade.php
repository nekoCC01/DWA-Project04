<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Web of thoughts')
    </title>

    <meta charset='utf-8'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

<a href="/">
    <header>
        <img src="/img/Logo.png" alt="">
    </header>
</a>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@stack('body')

</body>
</html>
