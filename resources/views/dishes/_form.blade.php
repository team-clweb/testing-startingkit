
@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam gerecht:</label>
<!--voorbeeld -->
{{html()->text('name',null)->class('border rounded w-full py-2 px-3')->placeholder('Naam gerecht')->required()}}

@error('description')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="description">Omschrijving:</label>
<x-input name="description" :value="old('description', $dish->description)" placeholder="Omschrijving" /><br>

@error('instructions')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="instructions">Recept:</label>
<x-input name="instructions" :value="old('instructions', $dish->recipe->instructions ?? '')" placeholder="Recept" /><br>


@foreach($ingrediens as $id=>$ingredient)
    {{html()->checkbox('recipe.ingredients[]',$dish->recipe->ingredients()->where('ingredients.id',$id)->exists(),$id)}} {{$ingredient}}<br />
    {{html()->text('recipe.ingredients['.$id.'][quantity]',null,'3434')}}<br />
@endforeach


<x-button.index type="submit">Opslaan</x-button.index>
