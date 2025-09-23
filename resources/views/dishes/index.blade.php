<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Gerechten</title>
</head>
<body>
{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Restaurant gerechten
        </h1>
    </div>
</section>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<p ><a href="{{route  ('dishes.create') }}" class="text-blue-600">Nieuw gerecht toevoegen</a></p>
{{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">Naam</th>
            <th scope="col" class="px-6 py-3">Beschrijving</th>
            <th scope="col" class="px-6 py-3">Recept</th>
            <th scope="col" class="px-6 py-3">Zie ingrediënten</th>
            <th scope="col" class="px-6 py-3">Bewerken</th>
            <th scope="col" class="px-6 py-3">Verwijderen</th>
        </tr>
        </thead>
        <tbody class="divide-y bg-white">
        @forelse($dishes as $dish)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $dish->name }}</td>
                <td class="px-6 py-4">{{ $dish->description ?? 'Geen beschrijving' }}</td>
                <td class="px-6 py-4">{{ $dish->recipe->instructions }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('dishes.show', $dish->id) }}" class="text-blue-600 hover:underline">
                        Bekijk ingrediënten
                    </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('dishes.edit', $dish->id) }}" class="text-blue-600">
                        Bewerken
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-600 ">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="py-4 text-center">
                    Momenteel geen gerechten beschikbaar
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
