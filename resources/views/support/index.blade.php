<x-app-layout>
    <x-slot name="header">
        <div class="h-[30vh] relative flex flex-col items-center justify-center">
            <img src="{{ asset('restaurant4.jpg') }}" class="absolute w-full h-full object-cover z-0">

            <h1 class="text-6xl font-bold text-white z-10 px-6 py-4 rounded-lg text-center font-serif drop-shadow-[2px_2px_2px_rgba(0,0,0,0.8)]">
                Contact
            </h1>
        </div>
    </x-slot>

    <div class="p-8 flex flex-col md:flex-row justify-between mt-6 mb-6">
        <p class="text-4xl font-semibold font-serif -ml-0 md:ml-44 md:mt-5">
            Contact
        </p>

        <div class="max-w-lg text-xl text-gray-700 -ml-0 md:mr-60">
            <p><span class="font-medium">Adres:</span> Rijndijk 12, 3606 PG Utrecht</p>
            <p><span class="font-medium">Telefoon:</span> (030) 309 98 38</p>
            <p><span class="font-medium">E-mail:</span> restaurant@dennis.nl</p>
        </div>
    </div>

    <div class="relative h-[100vh] md:h-[50vh] bg-[#E5E5E5] flex flex-col items-center">
        <h1 class="mt-10 text-4xl text-center font-display">
            Je bent altijd welkom om contact met ons op te nemen!
        </h1>

        @include('support._form')
    </div>

    @include('includes._reservation-modal')
</x-app-layout>


