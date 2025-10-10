<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Ingrediënt</title>
</head>
<body>
{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ingrediënten
        </h1>
    </div>
</section>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<p>
    {!! html()->a(route('ingredients.create'), 'Nieuw ingrediënten toevoegen')->class('text-blue-600') !!}
</p>

{{-- code afkomstig van https://flowbite.com/docs/components/tables/ --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full table-fixed text-sm text-center text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">Naam</th>
            <th class="px-6 py-3">Eenheid</th>
            <th class="px-6 py-3">Opslag</th>
            <th class="px-6 py-3">Bewerken</th>
            <th class="px-6 py-3">Verwijderen</th>
        </tr>
        </thead>
        <tbody class="divide-y bg-white">
        @forelse($ingredients as $ingredient)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $ingredient->name }}</td>
                <td class="px-6 py-4">{{ $ingredient->unit }}</td>
                <td class="px-6 py-4">{{ $ingredient->stock->quantity}}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="text-blue-600 hover:underline">
                        Bewerken
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit ingrediënt wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-gray-400">
                    Geen ingrediënten gevonden.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $ingredients->links() }}
</body>
</html>
