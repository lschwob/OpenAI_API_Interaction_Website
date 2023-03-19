<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/9f48a31df7.js" crossorigin="anonymous"></script>
    {{--  --}}
    
    <title>AskWise</title>
</head>
<body class="bg-white text-black dark:bg-black">
    <x-navbar></x-navbar>
    <div id="content" class="mx-auto">
        @yield('content')
    </div>
    <x-footer></x-footer>
</body>
    <script>

        const menu = document.getElementById('menu')
        const navlinks = document.getElementById('navlinks')
        const content = document.getElementById('content')

        menu.addEventListener('click', () => {
            navlinks.classList.toggle("mobile-menu");
            //Wait for the timeout once every 2clicks
            if (navlinks.classList.contains("mobile-menu")) {
                setTimeout(() => {
                    content.style.display = "none";
                }, 500);
            } else {
                content.style.display = "block";
            }
        });

    </script>
</html>