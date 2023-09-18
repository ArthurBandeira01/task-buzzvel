<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="keywords" content="Agência, blog, website, construção de sites, sistemas">
        <meta name="description" content="Task Buzzvel">
        <title>Tasks Buzzvel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>
    <body class="antialiased">
        @yield('content')
        @yield('script')
        <div class="adjust cursor-pointer text-xl" onclick="checkNightIcon()" id="adjust">
            <i class="fas fa-adjust" id="adjust-icon"></i>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function checkNightIcon(){
            const element = document.getElementById("adjust-icon");
            element.classList.toggle("adjust-check");
        }

        const darkMode = document.querySelector('#adjust');

        darkMode.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        });

        $(document).ready(function() {
            const isDarkMode = localStorage.getItem('darkMode') === 'true';

            if (isDarkMode) {
                enableDarkMode();
            }

            // Alternar entre o modo claro e o modo escuro quando o botão for clicado
            $('#toggleDarkMode').on('click', function() {
                if ($('body').hasClass('dark-mode')) {
                    disableDarkMode();
                } else {
                    enableDarkMode();
                }
            });

            function enableDarkMode() {
                $('body').addClass('dark-mode');
                localStorage.setItem('darkMode', 'true');
            }

            function disableDarkMode() {
                $('body').removeClass('dark-mode');
                localStorage.setItem('darkMode', 'false');
            }
        });
    </script>
</html>
