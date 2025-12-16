<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">

@include('includes._navbar')

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white relative">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ontdek de smaak van ons restaurant
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Geniet van heerlijke gerechten, verse ingrediënten en een warme sfeer.
        </p>
        <a href="{{ route('menu') }}" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Bekijk ons menu
        </a>

        @if(session('success'))
            <p class="text-green-500 font-bold text-3xl mt-10">
                {{ session('success') }}
            </p>
        @endif
    </div>
</section>

<main class="h-[75vh] relative flex items-center justify-center">
    <div id="main-carousel" class="absolute w-full h-full z-0 overflow-hidden" data-carousel="slide" data-carousel-interval="7000">
        <div class="hidden duration-1000 animate-spin" data-carousel-item="active">
            <img src="{{ asset('restaurant.webp') }}" class="absolute w-full h-full object-cover" alt="Restaurant">
        </div>

        <div class="hidden duration-1000 animate-spin" data-carousel-item>
            <img src="{{ asset('restaurant7.jpg') }}" class="absolute w-full h-full object-cover" alt="Restaurant">
        </div>
    </div>

    <h1 class="text-6xl font-bold text-white z-10 px-6 py-4 rounded-lg text-center font-serif drop-shadow-[2px_2px_2px_rgba(0,0,0,0.8)]">
        Welkom in ons restaurant
    </h1>
</main>

<section class="p-8 flex md:justify-between md:flex-row flex flex-col mt-12 mb-12">
    <p class="text-4xl font-semibold font-serif md:mt-16 md:ml-20 w-full">
        De beste plek voor een lekker hapje!
    </p>

    <p class="max-w-lg text-xl md:mr-60">
        Wij zijn meer dan alleen een restaurant.
        We zijn een plek waar je kunt genieten van goed eten, een ontspannen sfeer en oprechte gastvrijheid.
        Onze gerechten worden met zorg bereid, met verse en eerlijke ingrediënten van lokale leveranciers.
        Kom langs om te proeven, bij te praten en even helemaal tot rust te komen.
        Bij ons draait alles om smaak, kwaliteit en gezelligheid — natuurlijk!
    </p>
</section>

<section class="flex flex-col md:flex-row bg-[#E5E5E5] md:px-12">
    <img src="{{ asset('restaurant2.jpg') }}" class="w-full md:w-1/2 object-cover">
    <img src="{{ asset('restaurant3.jpg') }}" class="w-full md:w-1/2 object-cover">
</section>


<section class="p-4 md:justify-between md:flex-row flex flex-col bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif w-full md:w-auto md:ml-36 md:mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="md:md:max-w-lg w-full text-xl md:mr-36">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<section class="flex flex-col md:flex-row bg-[#E5E5E5] md:px-12">
    <img src="{{ asset('restaurant5.jpg') }}" class="w-full md:w-1/2 object-cover">
    <img src="{{ asset('restaurant6.jpg') }}" class="w-full md:w-1/2 object-cover">
</section>

<section class="p-4 md:justify-between md:flex-row flex flex-col bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif w-full md:w-auto md:ml-36 md:mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="md:md:max-w-lg w-full text-xl md:mr-36">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<section class="p-8 flex md:justify-between md:flex-row flex flex-col md:mt-8 md:mb-8">
    <p class="text-4xl font-semibold font-serif md:ml-32 w-full">
          Kom je bij ons eten?
    </p>

    <p class="text-3xl md:mr-60 font-semibold text-gray-800 hover:text-blue-600 inline-flex" onclick="openReservationModal()">
        Reserveren <span class="ml-2">→</span>
    </p>
</section>

<section class="flex flex-col md:flex-row bg-[#E5E5E5]">
    <img src="{{ asset('restaurant5.jpg') }}" class="w-full md:w-1/3 object-cover">
    <img src="{{ asset('restaurant6.jpg') }}" class="w-full md:w-1/3 object-cover">
    <img src="{{ asset('restaurant3.jpg') }}" class="w-full md:w-1/3 object-cover">
</section>

@include('includes._reservation-modal')

@include('includes._footer')

</body>
</html>
