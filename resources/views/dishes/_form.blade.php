@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam gerecht:</label>
{{html()->text('name')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Naam gerecht')->required()}}

@error('description')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="description">Omschrijving:</label>
{{html()->text('description',null)->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Omschrijving')}}

@error('instructions')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="instructions">Recept:</label>
{{ html()->text('instructions', old('instructions', $dish->recipe->instructions ?? ''))->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Recept')->required()}}

<label class="font-bold">Ingrediënten:</label><br><br>
@foreach($ingredients as $id => $ingredient)
    {{html()->checkbox('recipe.ingredients[]',$dish->recipe->ingredients()->where('ingredients.id',$id)->exists(),$id)}} {{$ingredient}}<br />
    {{html()->text('recipe.ingredients[' . $id . '][quantity]',optional(optional($dish->recipe->ingredients->firstWhere('id', $id))->pivot)->quantity)->placeholder('Hoeveel heb je nodig?')
 }}<br />
@endforeach

<x-button.index type="submit">Opslaan</x-button.index>
