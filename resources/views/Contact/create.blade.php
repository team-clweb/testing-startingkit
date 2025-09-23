<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Contact Aanmaken</title>
    @vite('resources/css/app.css')
</head>
<body>

<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            Nieuw Contact Aanmaken
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
            Vul hieronder de contactgegevens in om een nieuw contact toe te voegen.
        </p>
    </div>
</section>


<form action="{{ route('contact.store') }}" method="POST">
    @csrf

    @if ($errors->has('name'))
        <div class="text-red-600">{{ $errors->first('name') }}</div>
    @endif
    <x-input name="name" placeholder="Naam"  /><br>

    @if ($errors->has('organization'))
        <div class="text-red-600">{{ $errors->first('organization') }}</div>
    @endif
    <x-input name="organization" placeholder="Organisatie" required /><br>

    @if ($errors->has('city'))
        <div class="text-red-600">{{ $errors->first('city') }}</div>
    @endif
    <x-input name="city" placeholder="Stad" required /><br>


    <x-button.index type="submit">
        Opslaan
    </x-button.index>
</form>

<p><a href="{{ route('contact.index') }}" class="text-blue-600">Terug naar overzicht</a></p>

</body>
</html>
