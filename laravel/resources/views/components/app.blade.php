<!DOCTYPE html>
<html></html>
<head>
    <title>title</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Stock</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#topNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/items" class="nav-link">items</a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link">users</a>
                </li>
                <li class="nav-item">
                    <a href="/employees" class="nav-link">employees</a>
                </li>
                <li class="nav-item">
                    <a href="/image-upload" class="nav-link">upload</a>
                </li>
            </ul>


            <ul class="navbar-nav" style="margin-left: auto;">
                @auth
                <li class="nav-item"><span class="nav-link">logged in as: {{ auth()->user()->email }}</span></li>
                <li class="nav-item"><form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-item">loggout</button>
                </form></li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link">login</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container">
        {{$slot}}
    </div>
    <script src="/js/app.js"></script>
</body>
</html>