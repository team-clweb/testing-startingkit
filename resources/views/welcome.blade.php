<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #reservering-modal:target {
            display: flex;
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">

@include('includes._navbar')

{{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
<section class="bg-white relative">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Ontdek de smaak van ons restaurant
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Geniet van heerlijke gerechten, verse ingrediënten en een warme sfeer.
        </p>
        <a href="{{ route('dishes.index') }}" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Bekijk ons menu
        </a>

        @if(session('success'))
            <p class="text-green-500 font-bold text-3xl mt-10">
                {{ session('success') }}
            </p>
        @endif
    </div>
</section>


<main class="h-[75vh] relative flex items-center justify-center">
    <img src="{{ asset('restaurant.webp') }}" class="absolute w-full h-full object-cover z-0">

    <h1 class="text-6xl font-bold text-white z-10 px-6 py-4 rounded-lg text-center font-serif drop-shadow-[2px_2px_2px_rgba(0,0,0,0.8)] ">
        Welkom in ons restaurant
    </h1>
</main>

<section class="p-8 flex md:justify-between md:flex-row flex flex-col mt-12 mb-12">
    <p class="text-4xl font-semibold font-serif md:mt-16 md:ml-20 w-full">
        De beste plek voor een lekker hapje!
    </p>

    <p class="max-w-lg text-xl md:mr-60">
        Wij zijn meer dan alleen een restaurant.
        We zijn een plek waar je kunt genieten van goed eten, een ontspannen sfeer en oprechte gastvrijheid.
        Onze gerechten worden met zorg bereid, met verse en eerlijke ingrediënten van lokale leveranciers.
        Kom langs om te proeven, bij te praten en even helemaal tot rust te komen.
        Bij ons draait alles om smaak, kwaliteit en gezelligheid — natuurlijk!
    </p>
</section>

<section class="flex flex-col md:flex-row bg-[#E5E5E5] md:px-12">
    <img src="{{ asset('restaurant2.jpg') }}" class="w-full md:w-1/2 object-cover">
    <img src="{{ asset('restaurant3.jpg') }}" class="w-full md:w-1/2 object-cover">
</section>


<section class="p-4 md:justify-between md:flex-row flex flex-col bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif w-full md:w-auto md:ml-36 md:mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="md:md:max-w-lg w-full text-xl md:mr-36">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<section class="flex flex-col md:flex-row bg-[#E5E5E5] md:px-12">
    <img src="{{ asset('restaurant5.jpg') }}" class="w-full md:w-1/2 object-cover">
    <img src="{{ asset('restaurant6.jpg') }}" class="w-full md:w-1/2 object-cover">
</section>

<section class="p-4 md:justify-between md:flex-row flex flex-col bg-[#E5E5E5]">
    <p class="text-4xl font-semibold font-serif w-full md:w-auto md:ml-36 md:mt-5">
        Lorem ipsum dolor sit amet
    </p>

    <p class="md:md:max-w-lg w-full text-xl md:mr-36">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor in iste labore nostrum pariatur provident quaerat ratione temporibus voluptatum.
    </p>
</section>

<a href="#reservering-modal" class="fixed bottom-6 right-6 bg-blue-600 text-white font-semibold py-3 px-6 rounded-full">
    Reservering
</a>

<div id="reservering-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-md w-full p-6 relative ">
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


@include('includes._footer')

</body>
</html>
