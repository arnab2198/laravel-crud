<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>Laravel Crud</title>
</head>

<body>
    <div class="main-container">
        <nav class="navBar">
            <div>
                <h3>
                    <a href="/">Laravel Crud</a>
                </h3>
            </div>
            <div>
                <ul class="menuList">
                    @if(url()->current() === url('/') || str_contains(url()->current(), '/task'))
                    <li class="navAnchor">
                        <a href="/status/list">Status</a>
                    </li>
                    @elseif(str_contains(url()->current(), '/status'))
                    <li class="navAnchor">
                        <a href="/">Task</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        @yield('content')

    </div>
</body>

</html>