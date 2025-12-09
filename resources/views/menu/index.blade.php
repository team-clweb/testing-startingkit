<x-app-layout>
    <div class="flex justify-between">
        <div class="w-1/2 flex justify-center">
            <div class="mt-32 text-center">
                <div class="inline-block">
                    <h1 class="text-3xl md:text-5xl font-bold text-center mt-6 md:mt-10">Menu Dennis</h1>
                    <div class="h-1 bg-red-600 mt-2 mb-12 w-full"></div>
                </div>

                <div class="text-left ml-56">
                    <p>Bij ons draait alles om lekker eten, met zorg bereid <br>
                        in onze keuken, voor elke dag een smaakvolle maaltijd.</p>

                    <p class="mt-6">
                        Onze gerechten zijn een mix van traditie en creativiteit. <br>
                        We gebruiken verse ingrediënten en lokale producten om elke <br>
                        maaltijd een unieke smaak te geven. Soms volgen we klassieke recepten,<br>
                        soms laten we ons inspireren om nieuwe combinaties te ontdekken, <br>
                        zodat elk gerecht iets bijzonders wordt.
                    </p>
                </div>
            </div>
        </div>
        <img src="{{ asset('restaurant8.jpg') }}" class="w-1/2 object-cover">
    </div>

    <div class="max-w-lg p-6 border border-black rounded-base mt-20 mb-20 mx-auto">
        <h5 class="mb-4 text-2xl font-semibold text-center">Hoofdgerechten</h5>

        <div class="space-y-2">
            @foreach($dishes as $dish)
                <p class="font-bold">{{ $dish->name }}</p>
                <p>{{ $dish->description }}</p>

                @if(!$loop->last)
                    <hr class="border-black my-4">
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
