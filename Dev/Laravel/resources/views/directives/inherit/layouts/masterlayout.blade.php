<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Default Value')</title>
</head>

<body>
    <header>
        <h2>Header Page</h2>
    </header>

    <nav>
        <a href="/inherit">Home</a>
        <a href="/inherit/about">About</a>
        <a href="/inherit/contact">Contact</a>
    </nav>

    <main>
        <article>
            @yield('content', 'No content found!')
        </article>

        <article>
            @hasSection('info')
                @yield('info')
            @else
                <h3>No info defined!</h3>
            @endif
        </article>

        <article>
            @section('dynamic')
                <h2>Dynamic Content</h2>
            @show
        </article>
    </main>

    <footer>
        <h2>Footer Page</h2>
    </footer>
</body>

</html>
