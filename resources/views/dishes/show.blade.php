<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class=" text-center mt-5">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl mt-22">
                    {{ $dish->name }}
                </h1>
            </div>
        </section>
    </x-slot>

    <div class="flex flex-row justify-center my-12">
        {{-- Code afkomstig van https://flowbite.com/docs/components/card/ --}}
        <div class="block p-12 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 max-w-3xl w-full">
            <p class="mb-3 text-gray-500">{{ $dish->description }}</p>

            {{-- code afkomstig van https://flowbite.com/docs/typography/paragraphs/ --}}
            <h2 class="mb-2 text-lg font-semibold text-gray-900">Recept</h2>
            <p class="mb-3 text-gray-500">{{ $dish->recipe->instructions }}</p>

            <h2 class="mb-2 text-lg font-semibold text-gray-900">Ingrediënten</h2>
            <ul class="space-y-1 text-gray-700 list-disc list-inside">
                @foreach($dish->recipe->ingredients as $ingredient)
                    <li>
                        {{ $ingredient->name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->unit }} - Voorraad: {{ $ingredient->stock->quantity }}

                        @if($ingredient->allergies->isNotEmpty())
                            - Allergieën:
                            @foreach($ingredient->allergies as $allergy)
                                {{ $allergy->name }}@if(!$loop->last),@endif
                            @endforeach
                        @else
                            - Geen allergieën
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <p class="mt-4 text-center">
        <a href="{{ route('dishes.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
    </p>
</x-app-layout>

