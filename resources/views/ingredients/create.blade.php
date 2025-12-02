<x-app-layout>
    <x-slot name="header">
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
    </x-slot>

    {{ html()->form('POST', route('ingredients.store'))->class('max-w-xl mx-auto')->open() }}

    @error('name')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="name">Naam ingrediënt:</label>
    {{ html()->text('name')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Naam ingrediënt')->required()}}

    @error('unit')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="unit">Eenheid:</label>
    {{ html()->text('unit')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Eenheid')->required()}}

    @error('quantity')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    <label for="quantity">Opslag:</label>
    {{ html()->text('quantity', old('quantity', $ingredient->stock->quantity ?? ''))->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Recept')->required()}}

    <label class="font-bold">Allergieën:</label><br>
    @foreach($allergies as $id => $allergy)
        {{ html()->checkbox('allergies[]', in_array($id, old('allergies', [])), $id) }}{{ $allergy }}<br>
    @endforeach

    <x-button.index type="submit">Opslaan</x-button.index>

    {{ html()->closeModelForm() }}

    <p class="text-center mt-6">
        <a href="{{ route('ingredients.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
    </p>
</x-app-layout>
