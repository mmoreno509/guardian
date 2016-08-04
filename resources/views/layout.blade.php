<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ProjectGuardian</title>

        <link href="/css/app.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="navbar-fixed-top.css" rel="stylesheet">
    </head>

    <body>

        @include('top_bar')

        <div class="container">

            @hasSection('path')
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    @yield('path')
                </ol>
            @endif

            @yield('content')

        </div>
    </body>
</html>
