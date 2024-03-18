<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
        <div id="app">
            <hello-world/>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>

</html>