<!DOCTYPE html>
<html>
    <head>
        <title>
            {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
            @yield('title','P3')
        </title>
        <meta charset='utf-8'>
        <link href="/css/p3.css" type='text/css' rel='stylesheet'>
        {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
        @yield('head')
    </head>
    <body>
        <header>
            <a href="#content" class="sr-only">skip to content</a>
            <!--moon image by drkzin http://drkzin.deviantart.com/art/Moon-270917652 license: https://creativecommons.org/licenses/by-sa/3.0/ -->
            <!-- <h1><img alt="crash dummy 1" src="/images/dummy80pxRight.png"/>Dummy Data<img alt="crash dummy 2" src="/images/dummy80px.png"/></h1> -->
            <img alt="Dummy Data" src="/images/Dummy_Data.png"/>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/lorem-ipsum">Lorem-Ipsum</a></li>
                    <li><a href="/random-user">Random User</a></li>
                </ul>
            </nav>
        </header>
        <main id="content">
            <section>
                {{-- Main page content will be yielded here --}}
                @yield('content')
            </section>

        </main>
        <footer>
            <p>Created by SamGrise &copy; {{ date('Y') }}. Last Updated: October 27th 2016</p>
        </footer>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
        {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
        @yield('body')
    </body>
</html>
