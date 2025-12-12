<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Allergieën
                </h1>
            </div>
        </section>
    </x-slot>

    <p class="relative -top-4">
        {!! html()->a(route('allergies.create'), 'Nieuw allergeen toevoegen +')->class('py-3 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700') !!}
    </p>

    {{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
    <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg bg-white mb-20">
        <table class="min-w-full table-fixed text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Naam allergie</th>
                <th class="px-6 py-3">Beschrijving</th>
                <th class="px-6 py-3">Bewerken</th>
                <th class="px-6 py-3">Verwijderen</th>
            </tr>
            </thead>
            <tbody class="divide-y bg-white">
            @forelse($allergies as $allergy)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $allergy->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $allergy->description ?? 'Geen beschrijving' }}</td>

                    <td class="px-6 py-4">
                        {{ html()->form('GET', route('allergies.edit', $allergy->id))->open() }}
                        <button type="submit" class="text-blue-600 hover:underline">
                             Bewerken
                        </button>
                        {{ html()->closeModelForm() }}
                    </td>

                    <td class="px-6 py-4">
                        {{ html()->form('DELETE', route('allergies.destroy', $allergy->id))
                            ->attribute('onsubmit', "return confirm('Weet je zeker dat je deze allergie wilt verwijderen?');")
                            ->open() }}
                        <button type="submit" class="text-red-600 hover:underline">
                            Verwijderen
                        </button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="px-6 py-4 text-center text-red-600">
                        Geen allergieën gevonden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
