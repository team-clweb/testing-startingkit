<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
    <title>Ingrediënt aanmaken</title>
</head>
<body>

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ingrediënt bewerken
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Vul hieronder de gegevens in om het ingrediënt bij te werken.
        </p>
    </div>
</section>

{{ html()->modelForm($ingredient, 'PUT', route('ingredients.update', $ingredient))->class('max-w-xl mx-auto')->open() }}

@include('ingredients._form')

{{ html()->closeModelForm() }}


<p class="text-center mt-6">
    <a href="{{ route('ingredients.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
</p>

</body>
</html>
