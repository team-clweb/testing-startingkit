<x-app-layout>
    <div class="flex justify-between flex-col md:flex-row">
        <div class="flex justify-center">
            <div class="md:mt-32 text-center">
                <div class="inline-block">
                    <h1 class="text-3xl md:text-5xl font-bold text-center mt-6 md:mt-10">Menu Dennis</h1>
                    <div class="h-1 bg-red-600 mt-2 mb-12 w-full"></div>
                </div>

                <div class="td text-center md:text-start md:ml-72 w-full">
                <p>Bij ons draait alles om lekker eten, met zorg bereid <br>
                        in onze keuken, voor elke dag een smaakvolle maaltijd.</p>

                    <p class="mt-6 w-full mb-8">
                        Onze gerechten zijn een mix van traditie en creativiteit. <br>
                        We gebruiken verse ingrediënten en lokale producten om elke <br>
                        maaltijd een unieke smaak te geven. Soms volgen we klassieke recepten,<br>
                        soms laten we ons inspireren om nieuwe combinaties te ontdekken, <br>
                        zodat elk gerecht iets bijzonders wordt.
                    </p>
                </div>
                <div class="md:ml-60 mt-6 p-6 border-2 border-gray-400 rounded-lg bg-white shadow-md w-full md:w-2/3 mb-8">
                    <p class="text-gray-700">
                        Wij houden rekening met uw allergieën, deze allergieën zitten in onze gerechten:
                    </p>
                    <ul class="mt-2 flex flex-wrap">
                        @foreach($allergies as $allergy)
                            <div class="w-1/3 px-2 mt-2">
                              <li class="rounded-full bg-red-100 py-1 text-sm font-medium text-red-700">
                                  {{ $allergy->name }}
                              </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <img src="{{ asset('restaurant8.jpg') }}" class="md:w-1/2 md:object-cover">
    </div>

    <div class="max-w-lg p-6 border border-black rounded-base mt-20 mb-20 mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h5 class="text-2xl font-semibold">
                Hoofdgerechten
            </h5>

            <a href="{{ route('menu.pdf') }}"
               class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Download PDF
            </a>
        </div>

        <div class="space-y-6">
            @foreach($dishes as $dish)
                <div class="flex justify-between">
                    <div>
                        <p class="font-bold">{{ $dish->name }} €{{ $dish->price }}</p>
                        <p>{{ $dish->description }}</p>

                        <p class="mt-2">
                            <strong>Allergieën:</strong>
                            @if($dish->recipe)
                                @foreach($dish->recipe->ingredients as $ingredient)
                                    @foreach($ingredient->allergies as $allergy)
                                        {{ $allergy->name }}
                                    @endforeach
                                @endforeach
                            @else
                                Geen
                            @endif
                        </p>
                    </div>

                    <div>
                        @if($dish->image)
                            <img
                                src="{{ asset('storage/' . $dish->image) }}"
                                class="h-24 w-24 rounded-lg object-cover"
                            >
                        @else
                        @endif
                    </div>
                </div>

                @if(!$loop->last)
                    <hr class="border-black my-4">
                @endif
            @endforeach
        </div>

    @include('includes._reservation-modal')
</x-app-layout>
