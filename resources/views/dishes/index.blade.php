<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Gerechten</title>
</head>
<body>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Restaurant gerechten
        </h1>
    </div>
</section>
<p ><a href="" class="text-blue-600">Nieuw gerecht toevoegen</a></p>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Naam</th>
            <th scope="col" class="px-6 py-3">Beschrijving</th>
            <th scope="col" class="px-6 py-3">Recept</th>
            <th scope="col" class="px-6 py-3">Bewerken</th>
            <th scope="col" class="px-6 py-3">Verwijderen</th>
        </tr>
        </thead>
        <tbody class="divide-y bg-white dark:bg-gray-800 dark:divide-gray-700">
        @forelse($dishes as $dish)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $dish->name }}</td>
                <td class="px-6 py-4">{{ $dish->description }}</td>
                <td class="px-6 py-4">{{ $dish->recipe->instructions }}</td>
                <td class="px-6 py-4">
                    <a href="" class="text-blue-600">
                        Bewerken
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form>
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
                <td colspan="5" class="py-4 text-center">
                    Momenteel geen contacten beschikbaar
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
