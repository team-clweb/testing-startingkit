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

      <div class="max-w-3xl mx-auto px-4 my-12">
        <div class="bg-white shadow-2xl rounded-xl p-8 ">
            @if($ingredient->allergies->isEmpty())
                <div class="text-center">
                    <p class="text-red-600 font-semibold text-lg">
                        Er zijn geen allergieën gekoppeld aan {{strtolower($ingredient->name) }}
                    </p>
                </div>
            @else
                <h2 class="text-xl font-semibold text-gray-900 mb-4">
                    Allergieën
                </h2>

                <ul class="space-y-3">
                    @foreach($ingredient->allergies as $allergy)
                        <li class="flex items-start p-4 border rounded-lg hover:bg-gray-50 border-black">
                            <div class="mt-1 h-2 w-2 bg-red-500 rounded-full mr-3"></div>
                            <div>
                                <p class="font-medium text-gray-900">
                                    {{ $allergy->name }}
                                </p>
                                @if($allergy->description)
                                    <p class="text-sm text-gray-600">
                                        {{ $allergy->description }}
                                    </p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <p class="mt-4 text-center">
            <a href="{{ route('ingredients.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
        </p>
</x-app-layout>
