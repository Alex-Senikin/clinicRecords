<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Медицея</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link @yield('home_active')" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="/doctors" class="nav-link @yield('doctors_active')">Список врачей</a></li>
            <li class="nav-item"><a href="/record" class="nav-link @yield('record_active')">Запись на прием</a></li>
            <li class="nav-item"><a href="/about" class="nav-link @yield('about_active')">О нас</a></li>
            <li class="nav-item"><a href="/price" class="nav-link @yield('price_active')">Прайс</a></li>
            <li class="nav-item"><a href="/loginForm" class="nav-link @yield('login_active')">Вход (для сотрудников)</a></li>
        </ul>
    </header>
</div>

@yield('main_content')



<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-2 mb-0 text-muted">© 2022 Медицея</p>



        <ul class="nav col-md-5 justify-content-end">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Главная</a></li>
            <li class="nav-item"><a href="/doctors" class="nav-link px-2 text-muted">Список врачей</a></li>
            <li class="nav-item"><a href="/record" class="nav-link px-2 text-muted">Запись на прием</a></li>
            <li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">О нас</a></li>
            <li class="nav-item"><a href="/price" class="nav-link px-2 text-muted">Прайс</a></li>
        </ul>
    </footer>
</div>

</body>
</html>
