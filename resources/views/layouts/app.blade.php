<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laravel From Scratch Blog')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        @include('partials.nav')

        @yield('content')

        @include('partials.newsletter')
    </section>
</body>
</html>