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

<x-button.index type="submit">Opslaan</x-button.index>

