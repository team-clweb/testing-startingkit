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

@include('includes._navbar')

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

@include('includes._footer')

</body>
</html>
