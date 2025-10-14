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
    <div class="flex justify-center mt-4">
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    </div>
@endif


{{-- Laravel form building --}}

@can('update', App\Models\Dish::class)
<p>
    {!! html()->a(route('dishes.create'), 'Nieuw gerecht toevoegen')->class('text-blue-600') !!}
</p>
@endcan
{{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full table-fixed text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">Naam</th>
            <th class="px-6 py-3">Beschrijving</th>
            <th class="px-6 py-3">Recept</th>
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
                <td class="px-6 py-4">{{ $dish->recipe->instructions}}</td>

                <td class="px-6 py-4">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="img" class="w-24 h-24 object-cover mx-auto rounded">
                    @else
                        <span class="text-gray-400">Geen afbeelding</span>
                    @endif
                </td>

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
                        <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"  onsubmit="return confirm('Weet je zeker dat je dit gerecht wilt verwijderen?');">
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
                <td colspan="7" class="px-6 py-4 text-center text-red-600">
                    Geen gerechten gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $dishes->links() }}
</body>
</html>
