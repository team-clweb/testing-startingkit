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

        <p class="max-w-lg text-xl -ml-0 md:mr-60">
            Adres: Rijndijk 12, 3606 PG Utrecht<br>
            Telefoonnummer: (030) 309 98 38 <br>
            Email: restaurant@dennis.nl.
        </p>
    </div>

    <div class="relative h-[50vh] bg-[#E5E5E5] flex flex-col items-center">
        <h1 class="mt-10 text-4xl text-center font-display">
            Je bent altijd welkom om contact met ons op te nemen!
        </h1>

        <div class="flex justify-start w-full mt-10 items-start ml-32">
            {{ html()->form('POST', route('support.store'))->class('space-y-4 w-1/2 ml-10')->open() }}

            <div class="flex space-x-4">
                @error('firstname')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
                {{ html()->text('firstname')->class('w-1/3 border border-gray-400 rounded p-2')->placeholder('Voornaam')->required()}}

                @error('infix')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
                {{ html()->text('infix')->class('w-1/3 border border-gray-400 rounded p-2')->placeholder('Tussenvoegsel')}}

                @error('lastname')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
                {{ html()->text('lastname')->class('w-1/3 border border-gray-400 rounded p-2')->placeholder('Achternaam')->required()}}
            </div>

            @error('email')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            {{ html()->email('email')->class('w-full border border-gray-400 rounded p-2')->placeholder('Email')->required()}}

            @error('message')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            {{ html()->textarea('message')->class('w-full h-32 border border-gray-400 rounded p-2')->placeholder('Bericht')->required()}}

            <button type="submit" class="bg-[#4B3A2F] text-white px-6 py-2 rounded">
                Verstuur
            </button>

            {{ html()->closeModelForm() }}

            <img src="/chef-man-cap.svg" class="h-44 mt-10 mr-6 md:ml-32"/>
        </div>
    </div>
</x-app-layout>


