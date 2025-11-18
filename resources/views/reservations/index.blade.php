<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Reserveringen</title>
</head>
<body>

@include('includes._navbar')

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
             Reserveringen overzicht
        </h1>
    </div>
</section>

{{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full table-fixed text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">Naam</th>
            <th class="px-6 py-3">Telefoon</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">Reserveringsdatum</th>
            <th class="px-6 py-3">Tijd</th>
            <th class="px-6 py-3">Personen</th>
            <th class="px-6 py-3">Bericht</th>
        </tr>
        </thead>

        <tbody class="divide-y bg-white">
        @forelse($reservations as $reservation)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $reservation->name }}</td>
                <td class="px-6 py-4">{{ $reservation->phone }}</td>
                <td class="px-6 py-4">{{ $reservation->email }}</td>
                <td class="px-6 py-4">{{ $reservation->date }}</td>
                <td class="px-6 py-4">{{ $reservation->time }}</td>
                <td class="px-6 py-4">{{ $reservation->persons }}</td>
                <td class="px-6 py-4">{{ $reservation->message ?? 'geen bericht' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center text-red-600">
                    Geen reserveringen gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $reservations->links() }}


<div class="mt-20">
    @include('includes._footer')
</div>

</body>
</html>
