<!doctype html>
<html lang="en">

<head>
    <title>Layout Page</title>
    @stack('style')
</head>

<body>
    <header>
        <h2>Header Page</h2>
    </header>


    <main>
        <article>
            <h2>This is Content.</h2>
        </article>

        <article>
            @yield('info')
        </article>
    </main>

    <footer>
        <h2>Footer Page</h2>
    </footer>

    @stack('scripts')
</body>

</html>
