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

{{-- Laravel form building --}}
<p>
    {!! html()->a(route('dishes.create'), 'Nieuw gerecht toevoegen')->class('text-blue-600') !!}
</p>
{{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full table-fixed text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">Naam</th>
            <th class="px-6 py-3">Beschrijving</th>
            <th class="px-6 py-3">Recept</th>

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
                <td class="px-6 py-4">{{ $dish->recipe->instructions }}</td>

                @can('view', $dish)
                    <td class="px-6 py-4">
                        <a href="{{ route('dishes.show', $dish->id) }}" class="text-blue-600 hover:underline">
                            Bekijk ingrediënten
                        </a>
                    </td>
                @endcan

                @can('update', $dish)
                    <td class="px-6 py-4">
                        <a href="{{ route('dishes.edit', $dish->id) }}" class="text-blue-600">
                            Bewerken
                        </a>
                    </td>
                @endcan

                @can('delete', $dish)
                    <td class="px-6 py-4">
                        <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600">
                                Verwijderen
                            </button>
                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-400">
                    Geen gerechten gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
