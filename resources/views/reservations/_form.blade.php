@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam:</label>
<x-input name="name" :value="old('name', $reservation->name)" placeholder="Naam" required /><br>

@error('phone')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="phone">Telefoon:</label>
<x-input name="phone" :value="old('phone', $reservation->phone)" placeholder="Telefoonnummer" required /><br>

@error('email')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="email">Email:</label>
<x-input name="email" :value="old('email', $reservation->email)" placeholder="Email" required /><br>

@error('date')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="date">Datum reservering:</label>
<x-input type="date" name="date" :value="old('date', $reservation->date)" placeholder="Datum reservering" required /><br>

@error('time')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="time">Tijd</label>

@php
    $times = [
        '18:00', '18:30',
        '19:00', '19:30',
        '20:00', '20:30',
        '21:00', '21:30'
    ];
@endphp

<select name="time" class="w-full border rounded px-3 py-2 mb-4" required>
    @foreach($times as $time)
        <option value="{{ $time }}" {{ old('time') == $time ? 'selected' : '' }}>
            {{ $time }}
        </option>
    @endforeach
</select>

@error('persons')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="persons">Personen:</label>
<x-input name="persons" :value="old('persons', $reservation->persons)" placeholder="Personen" required /><br>

@error('message')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="message">Opmerking:</label>
<x-input name="message" :value="old('message', $reservation->message)"  cols="5" rows="5" class="w-full border rounded focus:ring-blue-700 focus:border-blue-700" placeholder="Bericht" /><br>

<x-button.index type="submit">Opslaan</x-button.index>
