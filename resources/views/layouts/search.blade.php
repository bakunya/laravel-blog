<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bundle.css">
    <link rel="stylesheet" href="/custom.css">
    <title>Laravel Blog - @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
        <div class="container-fluid">
            @auth
                <a class="navbar-brand" href="/home">Laravel Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/articles">Articles</a>
                        </li>
                        @isset ($categories)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($categories as $category)
                                        <li><a class="dropdown-item text-capitalize" href="/articles/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
                                    @endforeach
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/articles">Articles</a></li>
                                </ul>
                            </li>
                        @endisset
                        <li class="nav-item dropdown ms-lg-auto">
                            <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $user_information['username'] }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/home">Home</a></li>
                                <li><a class="dropdown-item" href="/home">Your Article</a></li>
                                <li><a class="dropdown-item" href="/article/action/create">Create Article</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest
                <span class="navbar-brand">Laravel Blog</span>
                <div class="d-flex align-items-center ms-auto">
                    <a class="nav-link active text-dark" role="button" href="/login">Login</a>
                    <a class="btn-warning btn" href="/register">Register</a>
                </div>
            @endguest
        </div>
    </nav>

    <main class="main">
        @yield('content')
    </main>

    <script src="/bundle.js"></script>
    <script src="/script/state.js"></script>

    @yield("script")
    @yield("inner-script")
</body>
</html>