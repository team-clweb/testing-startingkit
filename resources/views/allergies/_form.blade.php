@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam allergie:</label>
{{ html()->text('name')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Naam allergie')->required() }}

@error('description')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="description">Beschrijving:</label>
{{ html()->textarea('description')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Beschrijving van de allergie') }}

<x-button.index type="submit">Toevoegen</x-button.index>
