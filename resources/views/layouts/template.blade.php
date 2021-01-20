<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Project2D</title>
</head>
<body class="">
{{--  Navigation  --}}

@include('shared.navigation')

<main class="container size mt-3">

    @yield('main', 'Page under construction ...')
</main>
{{--  Footer  --}}
@include('shared.footer')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
