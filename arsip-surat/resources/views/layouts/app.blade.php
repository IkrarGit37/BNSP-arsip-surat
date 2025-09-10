<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Arsip Surat')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    @include('partials.sidebar')

    <div class="flex-1 flex flex-col min-h-screen ml-64">
        <!-- Header -->
        @include('partials.header')

        <!-- Konten -->
        <main class="flex-1 p-4">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.footer')
    </div>

</body>
</html>
