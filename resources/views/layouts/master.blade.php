<!DOCTYPE html>
<html lang='en'>
<head>

    <title>@yield('title', 'Project Database')</title>
    <meta charset='utf-8'>
    {{--}}<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>--}}
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          rel='stylesheet' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'
          crossorigin='anonymous'>
    <link href='/css/p4.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>


<body>

<header>
    <a href='/'><img src='/images/controls-markvie_pc.png' alt='MarkVie Panel'></a>

    @include('modules.nav')
</header>

@if(session('alert'))
    <div class='flashAlert'>{{ session('alert') }}</div>
@endif

<section>
    @yield('content')

</section>


<footer>
    <a href='http://github.com/oarangel/P4'><i class='fa fa-github'></i> View on Github</a>
</footer>


</body>
</html>
