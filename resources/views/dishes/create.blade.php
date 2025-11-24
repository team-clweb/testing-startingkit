<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Gerecht aanmaken
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
                    Vul hieronder de gegevens in om een nieuw gerecht toe te voegen.
                </p>
            </div>
        </section>
    </x-slot>

    {{ html()->form('POST', route('dishes.store'))->attribute('enctype', 'multipart/form-data')->class('max-w-xl mx-auto')->open() }}

    @error('name')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="name">Naam gerecht:</label>
    {{ html()->text('name')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Naam gerecht')->required() }}

    @error('description')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="description">Omschrijving:</label>
    {{ html()->text('description', null)->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Omschrijving') }}

    @error('instructions')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="instructions">Recept:</label>
    {{ html()->text('instructions', old('instructions', $dish->recipe->instructions ?? ''))->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Recept') }}

    @error('image')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="image">Afbeelding:</label>
    {{ html()->file('image')->accept('image/*')->class('mb-4') }}<br>

    @foreach($ingredients as $id => $ingredient)
        {{ html()->checkbox('recipe.ingredients[]', in_array($id, old('recipe.ingredients', [])), $id) }} {{$ingredient}}<br />
        {{ html()->text('recipe_ingredients[' . $id . '][quantity]', old('recipe_ingredients.' . $id . '.quantity'))->class('border rounded w-full py-2 px-3 mb-3') }}<br />
    @endforeach

    <x-button.index type="submit">
        Toevoegen
    </x-button.index>

    {{ html()->closeModelForm() }}

    <p class="text-center mt-6">
        <a href="{{ route('dishes.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
    </p>
</x-app-layout>
