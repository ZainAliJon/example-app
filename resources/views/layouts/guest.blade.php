<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link rel="stylesheet" href="{{ url('/resources/css/app.css') }}"> --}}
{{-- <script src="{{ url('/resources/js/app.js') }}"></script> --}}

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                   <img src="{{url('public/PasswordLog.png')}}" alt="Password Manager" style="width:50%;margin: auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md  px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
    <div style="position: absolute;bottom: 10px; right: 30px;font-size: 20px;">Version: <span style="color: #0076ba">v1.1.0</span></div>
        </div>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        var toggleButtons = document.querySelectorAll('.togglePassword');

        toggleButtons.forEach(function (toggleButton) {
            toggleButton.addEventListener('click', function () {
                var passwordInput = toggleButton.parentElement.parentElement.parentElement.children[0];

                if (passwordInput) {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleButton.classList.remove('fa-eye');
                        toggleButton.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        toggleButton.classList.remove('fa-eye-slash');
                        toggleButton.classList.add('fa-eye');
                    }
                } else {
                    console.error('Password input field not found.');
                }
            });
        });
    });
</script>





    </body>
</html>
