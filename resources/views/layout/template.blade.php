<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'WebGIS App' }}</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom Styles -->
    <style>
        body {
            background: url('https://id.pinterest.com/pin/510736414010133617/') no-repeat center center fixed;
            background-size: cover;
            color: #f1f1f1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 2rem 0;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: #ccc;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.9rem;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
        .transition-scale {
            transition: transform 0.3s ease;
        }
        .transition-scale:hover {
            transform: scale(1.03);
        }
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        }
    </style>

    @yield('styles')
</head>

<body>

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Konten --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <p class="mb-1">&copy; {{ date('Y') }} {{ $title ?? 'WebGIS' }}. All rights reserved.</p>
            <p>Built with 💚 by <a href="https://yourwebsite.com" target="_blank">Atika Putri</a></p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    @yield('scripts')

    {{-- Toast component --}}
    @include('components.toast')

</body>
</html>
