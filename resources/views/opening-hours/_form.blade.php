@error('day')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="day">Dag:</label>
{{ html()->text('day')->class('border rounded w-full py-2 px-3 mb-3')->attribute('readonly', true) }}


@error('open')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="open">Open:</label>
{{ html()->time('open')->class('border rounded w-full py-2 px-3 mb-3') }}

@error('close')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="close">Sluit:</label>
{{ html()->time('close')->class('border rounded w-full py-2 px-3 mb-3') }}

@error('closed')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="closed">
    {{ html()->checkbox('closed')
        ->checked(old('closed', $hour->closed ?? false))
        ->value(1)
    }}
    Gesloten
</label><br>


<x-button.index type="submit">Opslaan</x-button.index>
