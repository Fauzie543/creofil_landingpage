<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ini penting buat mobile responsif -->
    <title>@yield('title', 'CREOFIL STUDIO')</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/logo.creofil.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta name="description"
        content="@yield('meta_description', 'Creofil is a creative studio and space that provides everything you need.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'Creofil, Studio, Space, Event, Menu, Coffee Shop, Bogor, cibinong')">
    <meta name="author" content="Creofil Studio & Space">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    html,
    body {
        height: 100%;
        font-family: 'Poppins', sans-serif;
    }

    /* Modal transition */
    .modal-hidden {
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .modal-visible {
        opacity: 1;
        pointer-events: auto;
        transition: opacity 0.3s ease;
    }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Flexbox biar footer ke bawah -->

    @if (!in_array(Route::currentRouteName(), ['linktree']))
    @include('landing.partials.navbar')
    @endif

    <main class="flex-fill">
        <!-- Flex-fill biar main nge-push footer ke bawah -->
        @yield('content')
    </main>

    @stack('modals')

    @include('landing.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    @stack('scripts')
</body>

</html>