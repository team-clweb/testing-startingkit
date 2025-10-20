<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
{{-- code afkomstig van https://flowbite.com/docs/components/navbar/ --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            {{-- als ik nog later een logo vind <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Restaurant Dennis</span>
        </a>

        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg
                   md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200
                   dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row items-center p-4 md:p-0 mt-4 border border-gray-100
                       rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white
                       dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li><a href="{{ route('dishes.index') }}" class="block py-2 px-3 md:p-0 text-gray-900 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500">Menu</a></li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 px-3 md:p-0 text-green-600 font-semibold hover:underline dark:text-green-400">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block py-2 px-3 md:p-0 text-red-600 hover:underline dark:text-red-400">
                                    Uitloggen
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 md:p-0 text-blue-600 font-semibold hover:underline dark:text-blue-400">
                                Inloggen
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 px-3 md:p-0 text-blue-600 hover:underline dark:text-blue-400">
                                    Registreren
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ontdek de smaak van ons restaurant
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Geniet van heerlijke gerechten, verse ingrediënten en een warme sfeer.
        </p>
        <a href="{{ route('dishes.index') }}" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Bekijk ons menu
        </a>
    </div>
</section>

<main class="h-[75vh] relative flex items-center justify-center">
    <img src="{{ asset('restaurant.webp') }}" class="absolute w-full h-full object-cover z-0">

    <h1 class="text-5xl font-bold text-white z-10 bg-black/60 px-6 py-4 rounded-lg shadow-lg backdrop-blur-sm text-center">
        Welkom in ons restaurant
    </h1>
</main>

<section class="p-8 flex justify-between">
    <p class="text-4xl font-semibold font-serif mt-16">
        De beste plek voor een lekker hapje!
    </p>

    <p class="max-w-lg text-xl mr-20">
        Wij zijn meer dan alleen een restaurant.
        We zijn een plek om tot rust te komen, je te laten inspireren door de veelzijdigheid van de natuur en te ontdekken hoeveel moois ons eigen land te bieden heeft.
        Ervaar wat lokaal en vers eten van eigen grond betekent. In onze kassen, volle grond, verticale farm en theetuin groeien dagelijks producten die ons inspireren en die we met liefde met jou delen.
        Alles draait om de smaak van echt. Natuurlijk!
    </p>
</section>

{{-- code afkomstig van https://flowbite.com/docs/components/footer/ --}}
<footer class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-8 lg:py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Contactgegevens --}}
            <div>
                <h2 class="mb-4 text-sm font-semibold uppercase">Contact</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Rijndijk 12, 3606 PG Utrecht</p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">(030) 309 98 38</p>
                <p class="text-gray-600 dark:text-gray-400">restaurant@dennis.nl</p>
            </div>

            {{-- Openingstijden --}}
            <div>
                <h2 class="mb-4 text-sm font-semibold uppercase text-center">Openingstijden restaurant</h2>
                <ul class="text-gray-600 dark:text-gray-400 font-medium text-center space-y-1">
                    <li>Dinsdag: 18:00 t/m 22:00</li>
                    <li>Woensdag: 18:00 t/m 22:00</li>
                    <li>Donderdag: 17:00 t/m 22:00</li>
                    <li>Vrijdag: 11:00 t/m 22:00</li>
                    <li>Zaterdag: 10:00 t/m 22:00</li>
                    <li>Zondag: 10:00 t/m 21:00</li>
                    <li>Maandag: gesloten</li>
                </ul>
            </div>

            {{-- test kolom --}}
            <div class="text-right">
                <div class="inline-block text-left">
                    <h2 class="mb-4 text-sm font-semibold uppercase">Test kolom</h2>
                    <ul class="text-gray-600 dark:text-gray-400 font-medium space-y-1">
                        <li>test kolom 1</li>
                        <li>test kolom 2</li>
                        <li>test kolom 3</li>
                        <li>test kolom 4</li>
                        <li>test kolom 5</li>
                        <li>test kolom 6</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500 dark:text-gray-400">
            © 2025 Restaurant - Dennis
        </div>
    </div>
</footer>

</body>
</html>
