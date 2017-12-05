<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Web of thoughts')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Raleway" rel="stylesheet">

    @stack('head')

</head>
<body>

@if(session('alert'))
    <div class='alert'>
        {{ session('alert') }}
    </div>
@endif
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand" href="/">
            <img src="/img/Logo.png" alt="">
            Web of thoughts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active" id="home">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="quotes">
                    <a class="nav-link" href="/quote/all">Quotes <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="concepts">
                    <a class="nav-link" href="/concept/all">Concepts <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="arguments">
                    <a class="nav-link" href="/argument/all">Arguments <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" id="youarehere">
        Current position
    </div>
</header>


<main role="main">

    <div class="jumbotron">
        <div class="container">
            @yield('featured_content')
        </div>
    </div>


    @yield('content')


</main>

<footer>
    &copy; {{ date('Y') }}
</footer>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

@stack('body')

</body>
</html>
