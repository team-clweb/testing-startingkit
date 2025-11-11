<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #reservering-modal:target {
            display: flex;
        }
    </style>
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

    <h1 class="text-6xl font-bold text-white z-10 px-6 py-4 rounded-lg text-center font-serif drop-shadow-[2px_2px_2px_rgba(0,0,0,0.8)] ">
        Welkom in ons restaurant
    </h1>
</main>

<section class="p-8 flex justify-between mt-12 mb-12">
    <p class="text-4xl font-semibold font-serif mt-16 ml-20">
        De beste plek voor een lekker hapje!
    </p>

    <p class="max-w-lg text-xl mr-60">
        Wij zijn meer dan alleen een restaurant.
        We zijn een plek waar je kunt genieten van goed eten, een ontspannen sfeer en oprechte gastvrijheid.
        Onze gerechten worden met zorg bereid, met verse en eerlijke ingrediënten van lokale leveranciers.
        Kom langs om te proeven, bij te praten en even helemaal tot rust te komen.
        Bij ons draait alles om smaak, kwaliteit en gezelligheid — natuurlijk!
    </p>
</section>

<section class="flex bg-gray bg-[#E5E5E5] px-12">
      <img src="{{ asset('restaurant2.jpg') }}" class="w-1/2 object-cover">
      <img src="{{ asset('restaurant3.jpg') }}" class="w-1/2 object-cover">
</section>

<section class="p-4  flex justify-between bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif ml-36 mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="max-w-lg text-xl mr-36">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<section class="flex bg-gray bg-[#E5E5E5] px-12">
    <img src="{{ asset('restaurant5.jpg') }}" class="w-1/2 object-cover">
    <img src="{{ asset('restaurant6.jpg') }}" class="w-1/2 object-cover">
</section>

<section  class="p-4  flex justify-between bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif ml-36 mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="max-w-lg text-xl mr-36">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<a href="#reservering-modal" class="fixed bottom-6 right-6 bg-blue-600 text-white font-semibold py-3 px-6 rounded-full">
    Reservering
</a>

<div id="reservering-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-md w-full p-6 relative ">
        <h2 class="text-2xl font-semibold mb-4">Reserveer een tafel</h2>

        {{ html()->form('POST', route('reservations.store'))->class('space-y-4')->open() }}
            <div>
                <label class="font-medium">Naam</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">E-mailadres</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">Telefoonnummer</label>
                <input type="tel" name="phone" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">Datum</label>
                <input type="date" name="date" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">Tijd</label>
                <input type="time" name="time" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">Aantal personen</label>
                <input type="number" name="persons" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="font-medium">Opmerking</label>
                <textarea name="message" id="message " cols="5" rows="5"  class="w-full border rounded focus:ring-blue-700 focus:border-blue-700" placeholder="Schrijf hier je opmerking..."></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Verzenden</button>
        {{ html()->closeModelForm() }}

        <a href="#" class="absolute top-3 right-4 text-gray-600 text-2xl mt-3">x</a>
    </div>
</div>

@include('includes._footer')

</body>
</html>
