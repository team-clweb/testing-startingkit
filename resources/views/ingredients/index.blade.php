<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Ingrediënten
                </h1>
            </div>
        </section>
    </x-slot>

    <p class="relative -top-4">
        {!! html()->a(route('ingredients.create'), 'Nieuw ingrediënt toevoegen +')->class('py-3 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700') !!}
    </p>

    {{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full table-fixed text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Naam</th>
                <th class="px-6 py-3">Eenheid</th>
                <th class="px-6 py-3">Opslag</th>
                <th class="px-6 py-3">Bekijk allergieën</th>
                <th class="px-6 py-3">Bewerken</th>
                <th class="px-6 py-3">Verwijderen</th>
            </tr>
            </thead>
            <tbody class="divide-y bg-white">
            @forelse($ingredients as $ingredient)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $ingredient->name }}</td>
                    <td class="px-6 py-4">{{ $ingredient->unit }}</td>
                    <td class="px-6 py-4">{{ $ingredient->stock->quantity }}</td>

                    <td class="px-6 py-4">
                        {{ html()->form('GET', route('ingredients.show', $ingredient->id))->open() }}
                        <button type="submit" class="text-blue-600 hover:underline">
                            Bekijk allergieën
                        </button>
                        {{ html()->closeModelForm() }}
                    </td>

                    <td class="px-6 py-4">
                        {{ html()->form('GET', route('ingredients.edit', $ingredient->id))->open() }}
                        <button type="submit" class="text-blue-600 hover:underline">
                            Bewerken
                        </button>
                        {{ html()->closeModelForm() }}
                    </td>

                    <td class="px-6 py-4">
                        {{ html()->form('DELETE', route('ingredients.destroy', $ingredient->id))
                          ->attribute('onsubmit', "return confirm('Weet je zeker dat je dit ingrediënt wilt verwijderen?');")->open()}}

                        <button type="submit" class="text-red-600 hover:underline">
                            Verwijderen
                        </button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-red-600">
                        Geen ingrediënten gevonden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4">
        {{ $ingredients->links() }}
    </div>
</x-app-layout>
