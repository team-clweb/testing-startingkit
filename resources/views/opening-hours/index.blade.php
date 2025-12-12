<x-app-layout>
  <x-slot name="header">
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                Openingstijden
            </h1>
        </div>
    </section>
   </x-slot>

<div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg bg-white mb-20">
    <table class="min-w-full table-fixed text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">Dag</th>
            <th class="px-6 py-3">Open</th>
            <th class="px-6 py-3">Sluit</th>
            <th class="px-6 py-3">Gesloten?</th>
            <th class="px-6 py-3">Bewerken</th>
        </tr>
        </thead>
        <tbody class="divide-y bg-white">
        @forelse($openingHours as $hour)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{($hour->day) }}</td>
                <td class="px-6 py-4">
                    {{ $hour->closed ? '-' : $hour->open }}
                </td>
                <td class="px-6 py-4">
                    {{ $hour->closed ? '-' : $hour->close }}
                </td>
                <td class="px-6 py-4">
                    {{ $hour->closed ? 'Ja' : 'Nee' }}
                </td>
                <td class="px-6 py-4">
                    {{ html()->form('GET', route('opening-hours.edit', $hour->id))->open() }}
                    <button type="submit" class="text-blue-600 hover:underline">
                        Bewerken
                    </button>
                    {{ html()->closeModelForm() }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-red-600">
                    Geen openingstijden gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
  </div>
</x-app-layout>
