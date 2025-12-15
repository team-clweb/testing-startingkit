<button
    type="button"
    onclick="openReservationModal()"
    class="fixed bottom-6 right-6 bg-blue-600 text-white font-semibold py-3 px-6 rounded-full">
    Reservering
</button>

<div id="reservering-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-md w-full p-6 relative max-h-[90vh] overflow-y-auto">
        <h2 class="text-2xl font-semibold mb-4">Reserveer een tafel</h2>

        @if(session('error'))
            <div class="text-red-600 mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{ html()->form('POST', route('reservations.store'))->class('space-y-4')->open() }}
        <div>
            @error('name')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Naam</label>
            {{ html()->text('name')->class('border rounded w-full py-2 px-3')->placeholder('Naam')->required()}}
        </div>
        <div>
            @error('phone')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Telefoonnummer</label>
            {{ html()->text('phone')->class('border rounded w-full py-2 px-3')->placeholder('Telefoonnummer')->required()}}
        </div>
        <div>
            @error('email')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Email</label>
            {{ html()->email('email')->class('border rounded w-full py-2 px-3')->placeholder('Email')->required()}}
        </div>
        <div>
            @error('date')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Reserveringsdatum</label>
            {{ html()->date('date')->class('border rounded w-full py-2 px-3')->required()}}
        </div>
        <div>
            @error('time')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Tijd</label>
            <select name="time" class="w-full border rounded px-3 py-2" required>
                @php
                    $times = [
                        '17:30 - 18:30',
                        '18:00 - 19:30',
                        '19:00 - 20:30',
                        '19:30 - 21:00',
                        '20:00 - 21:00'
                    ];
                @endphp

                <option value="">Kies een tijd</option>

                @foreach($times as $time)
                    <option {{ old('time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                @endforeach
            </select>
        </div>
        <div>
            @error('persons')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Aantal personen</label>
            {{ html()->number('persons')->class('border rounded w-full py-2 px-3')->placeholder('Personen')->required()}}
        </div>
        <div>
            @error('message')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
            <label class="font-medium">Opmerking</label>
            {{ html()->textarea('message')->rows(5)->class('border rounded w-full py-2 px-3')->placeholder('Wil je ons laten weten wat je dieetwensen zijn? Zoals: vegatarisch, veganistisch en allergieën? Of heb je nog andere opmerkingen?')}}
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Verzenden</button>
        {{ html()->closeModelForm() }}

        <button type="button" onclick="closeReservationModal()" class="absolute top-3 right-4 text-gray-600 text-2xl mt-3">x</button>
    </div>
</div>

{{-- code van https://stackoverflow.com/questions/33459143/keeping-modal-dialog-open-after-validation-error-laravel (reactie Sania Yousuf) --}}
{{-- gebruikt zodat de modal openblijft na een validatie error --}}
<script>
    function openReservationModal() {
        document.getElementById('reservering-modal').style.display = 'flex';
    }

    {{-- gebruikt zodat je na validatie error nog steeds de modal kan sluiten --}}
    function closeReservationModal() {
        document.getElementById('reservering-modal').style.display = 'none';
    }

    @if ($errors->any() || session('error'))
    window.addEventListener('DOMContentLoaded', function() {
        openReservationModal();
    });
    @endif
</script>
