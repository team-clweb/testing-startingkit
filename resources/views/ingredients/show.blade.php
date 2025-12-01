<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="text-center mt-5">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl mt-22">
                    {{ $ingredient->name }}
                </h1>
            </div>
        </section>
    </x-slot>

    <div class="flex flex-row justify-center my-12">
        {{-- Code afkomstig van https://flowbite.com/docs/components/card/ --}}
        <div class="block p-12 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 max-w-2xl w-full">
            @if($ingredient->allergies->isEmpty())
                <p class="text-red-700 font-bold text-lg text-center">Er zijn geen allergieën gekoppeld aan {{strtolower($ingredient->name) }}</p>
            @else
                <h2 class="mb-2 text-lg font-semibold text-gray-900">Allergieën</h2>
                <ul class="mb-3 list-disc list-inside text-gray-700 space-y-1">
                    @foreach($ingredient->allergies as $allergy)
                        <li>
                            {{ $allergy->name }} @if($allergy->description) - {{ $allergy->description }}@endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <p class="mt-4 text-center">
        <a href="{{ route('ingredients.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
    </p>
</x-app-layout>
