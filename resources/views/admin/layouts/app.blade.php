<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin - Creofil' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/logo.creofil.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-light">

    <div class="d-flex">
        {{-- Sidebar --}}
        @include('admin.layouts.sidenav')

        {{-- Main Content Wrapper --}}
        <div class="d-flex flex-column flex-grow-1 min-vh-100">

            {{-- Navbar --}}
            @include('admin.layouts.navbar')

            {{-- Page Content --}}
            <main class="flex-grow-1 overflow-auto p-4 bg-white">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('admin.layouts.footer')

        </div>
    </div>



    {{-- SweetAlert Flash Messages --}}
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('
        success ') }}',
        confirmButtonColor: '#fca311'
    });
    </script>
    @endif

    @if(session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('
        error ') }}',
        confirmButtonColor: '#fca311'
    });
    </script>
    @endif

    {{-- Bootstrap JS & SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>