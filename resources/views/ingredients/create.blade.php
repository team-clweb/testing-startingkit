<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
    <title>Ingredient aanmaken</title>
</head>
<body>

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ingrediënt aanmaken
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Vul hieronder de gegevens in om een nieuw ingrediënt toe te voegen.
        </p>
    </div>
</section>

{{ html()->form('POST', route('ingredients.store'))->class('max-w-xl mx-auto')->open() }}

    @error('name')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="name">Naam ingrediënt:</label>
    <x-input name="name" :value="old('name')" placeholder="Naam ingrediënt" required /><br>

    @error('unit')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="unit">Eenheid:</label>
    <x-input name="unit" :value="old('unit')" placeholder="Eenheid" required /><br>

    @error('quantity')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="quantity">Opslag:</label>
    <x-input name="quantity" type="number" :value="old('quantity', 0)" placeholder="Opslag" required /><br>

    <x-button.index type="submit">
        Toevoegen
    </x-button.index>
{{ html()->closeModelForm() }}

<p class="text-center mt-6">
    <a href="{{ route('ingredients.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
</p>

</body>
</html>
