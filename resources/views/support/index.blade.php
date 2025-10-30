<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    @vite('resources/css/app.css')
</head>
<body>
@include('includes._navbar')

<div class="h-[30vh] relative flex items-center justify-center">
    <img src="{{ asset('restaurant4.jpg') }}" class="absolute w-full h-full object-cover z-0">

    <h1 class="text-6xl font-bold text-white z-10 px-6 py-4 rounded-lg text-center font-serif drop-shadow-[2px_2px_2px_rgba(0,0,0,0.8)] ">
        Contact
    </h1>
</div>

<div class="p-8 flex justify-between mt-6 mb-6">
    <p class="text-4xl font-semibold font-serif ml-44 mt-5">
        Contact
    </p>

    <p class="max-w-lg text-xl mr-60">
        Adres: Rijndijk 12, 3606 PG Utrecht<br> Telefoonnummer: (030) 309 98 38 <br> E-mail: restaurant@dennis.nl.
    </p>
</div>

<div class="relative h-[50vh] bg-[#E5E5E5] flex flex-col items-center">
    <h1 class="mt-10 text-4xl text-center">
        Je bent altijd welkom om contact met ons op te nemen!
    </h1>

    <div class="flex justify-between w-full mt-10 items-start">
        <form class="space-y-4 w-1/2 ml-10">
            <div class="flex space-x-4">
                <input type="text" placeholder="Voornaam" class="w-1/2 border border-gray-400 rounded" />
                <input type="text" placeholder="Achternaam" class="w-1/2 border border-gray-400 rounded" />
            </div>
            <input type="email" placeholder="E-mail" class="w-full border border-gray-400 rounded" />
            <textarea placeholder="Bericht" class="w-full h-32 border border-gray-400 rounded"></textarea>
            <button type="button" class="bg-[#4B3A2F] text-white px-6 py-2 rounded">Verstuur</button>
        </form>
        <img src="/chef-man-cap.svg" class="h-44 mt-10 ml-20" alt="Chef logo" />
    </div>
</div>


@include('includes._footer')
</body>
</html>
