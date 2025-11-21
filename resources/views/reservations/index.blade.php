<x-app-layout>
    <x-slot name="header">
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    {{ __('Reserveringen overzicht') }}
                </h1>
            </div>
        </section>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mb-20">
        <table class="w-full table-fixed text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">Naam</th>
                <th class="px-6 py-3">Telefoon</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Reserveringsdatum</th>
                <th class="px-6 py-3">Tijd</th>
                <th class="px-6 py-3">Personen</th>
                <th class="px-6 py-3">Opmerking</th>
                <th class="px-6 py-3">Bewerken</th>
                <th class="px-6 py-3">Annuleren</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @forelse($reservations as $reservation)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $reservation->name }}</td>
                    <td class="px-6 py-4">{{ $reservation->phone }}</td>
                    <td class="px-6 py-4">{{ $reservation->email }}</td>
                    <td class="px-6 py-4">{{ $reservation->date }}</td>
                    <td class="px-6 py-4">{{ $reservation->time }}</td>
                    <td class="px-6 py-4">{{ $reservation->persons }}</td>
                    <td class="px-6 py-4">{{ $reservation->message ?? 'geen bericht' }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-blue-600 hover:underline">
                            Bewerken
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze reservering wilt annuleren?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                Annuleren
                            </button>
                        </form>
                   </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 text-center text-red-600">
                        Geen reserveringen gevonden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $reservations->links() }}
        </div>
    </div>
</x-app-layout>
