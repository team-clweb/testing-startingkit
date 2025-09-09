<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Contact bewerken</title>
</head>
<body>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Contact bewerken
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
            Vul hieronder de nieuwe contactgegevens in om het bij te werken.
        </p>
    </div>
</section>

<form action="{{ route('contact.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($errors->has('name'))
        <div class="text-red-600">{{ $errors->first('name') }}</div>
    @endif
    <x-input name="name" :value="old('name', $contact->name)" placeholder="Naam" required /><br>

    @if ($errors->has('organization'))
        <div class="text-red-600">{{ $errors->first('organization') }}</div>
    @endif
    <x-input name="organization" :value="old('organization', $contact->company->organization)" placeholder="Organisatie" required /><br>

    @if ($errors->has('city'))
        <div class="text-red-600">{{ $errors->first('city') }}</div>
    @endif
    <x-input name="city" :value="old('city', $contact->company->city)" placeholder="Stad" required /><br>

        <x-button.index type="submit">
            Opslaan
        </x-button.index>
  </form>

<p><a href="{{ route('contact.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a></p>

</body>
</html>
