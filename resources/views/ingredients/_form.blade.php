@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam ingrediënt:</label>
<x-input name="name" :value="old('name', $ingredient->name)" placeholder="Naam ingrediënt" required /><br>

@error('unit')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="unit">Eenheid:</label>
<x-input name="unit" :value="old('unit', $ingredient->unit)" placeholder="Eenheid" required /><br>

@error('quantity')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="quantity">Opslag:</label>
<x-input name="quantity" type="number" :value="old('quantity', $ingredient->stock->quantity)" placeholder="Opslag" required /><br>

<x-button.index type="submit">Opslaan</x-button.index>
