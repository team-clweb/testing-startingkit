<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Restaurant gerechten
                </h1>
            </div>
        </section>
    </x-slot>

    <div class="mb-4">
        {{ html()->form('GET', route('dishes.index'))->open() }}

        {{ html()->text('search', $search ?? '')
            ->placeholder('Zoek gerecht...')
            ->class('border border-gray-300 rounded-lg px-3 py-2 w-60 mb-6') }}

        {{ html()->button('Zoeken')
            ->type('submit')
            ->class('px-4 py-2 bg-blue-600 text-white rounded-lg mb-6') }}

        @if(!empty($search))
            {{ html()->a(route('dishes.index'), 'Reset')
                ->class('text-gray-600 underline') }}
        @endif

        {{ html()->form()->close() }}
    </div>


    {{-- Laravel form building --}}
    @can('update', App\Models\Dish::class)
        <p class="relative -top-4">
            {!! html()->a(route('dishes.create'), 'Nieuw gerecht toevoegen +')->class('py-3 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700') !!}
        </p>
    @endcan

    {{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
    <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
        <table class="min-w-full table-fixed text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Naam</th>
                <th class="px-6 py-3">Beschrijving</th>
                <th class="px-6 py-3">Prijs</th>

                @can('view', App\Models\Dish::class)
                    <th class="px-6 py-3">Recept</th>
                @endcan

                <th class="px-6 py-3">Afbeelding</th>

                @can('view', App\Models\Dish::class)
                    <th class="px-6 py-3">Zie ingrediënten</th>
                @endcan

                @can('update', App\Models\Dish::class)
                    <th class="px-6 py-3">Bewerken</th>
                @endcan

                @can('delete', App\Models\Dish::class)
                    <th class="px-6 py-3">Verwijderen</th>
                @endcan
            </tr>
            </thead>

            <tbody class="divide-y bg-white">
            @forelse($dishes as $dish)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $dish->name }}</td>
                    <td class="px-6 py-4">{{ $dish->description ?? 'Geen beschrijving' }}</td>
                    <td class="px-6 py-4">€{{ $dish->price }}</td>

                @can('view', $dish)
                        <td class="px-6 py-4">{{ $dish->recipe->instructions }}</td>
                    @endcan

                    <td class="px-6 py-4">
                        @if($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}" alt="img" class="w-24 h-24 object-cover mx-auto rounded hover:scale-150 duration-300">
                        @else
                            <span class="text-gray-400">Geen afbeelding</span>
                        @endif
                    </td>

                @can('view', $dish)
                        <td class="px-6 py-4">
                            {{ html()->form('GET', route('dishes.show', $dish->id))->open() }}
                            <button type="submit" class="text-blue-600 hover:underline">
                                Bekijk ingrediënten
                            </button>
                            {{ html()->closeModelForm() }}
                        </td>
                    @endcan

                    @can('update', $dish)
                        <td class="px-6 py-4">
                            {{ html()->form('GET', route('dishes.edit', $dish->id))->open() }}
                            <button type="submit" class="text-blue-600 hover:underline">
                                Bewerken
                            </button>
                            {{ html()->closeModelForm() }}
                        </td>
                    @endcan

                    @can('delete', $dish)
                        <td class="px-6 py-4">
                            {{ html()->form('DELETE', route('dishes.destroy', $dish->id))
                                ->attribute('onsubmit', "return confirm('Weet je zeker dat je dit gerecht wilt verwijderen?');")->open()
                             }}

                            <button type="submit" class="text-red-600">
                                Verwijderen
                            </button>

                            {{ html()->closeModelForm() }}
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-red-600">
                        Geen gerechten gevonden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4">
        {{ $dishes->links() }}
    </div>
</x-app-layout>
