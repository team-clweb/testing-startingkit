<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Contact Aanmaken</title>
    @vite('resources/css/app.css')
</head>
<body>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Nieuw Contact Aanmaken
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
            Vul hieronder de contactgegevens in om een nieuw contact toe te voegen.
        </p>
    </div>
</section>

<form action="{{ route('contact.store') }}" method="POST">
    @csrf

    <x-input name="name" placeholder="Naam" required /><br>
    <x-input name="organization" placeholder="Organisatie" required /><br>
    <x-input name="city" placeholder="Stad" required /><br>


    <x-button.index type="submit">
        Opslaan
    </x-button.index>
</form>

<p><a href="{{ route('contact.index') }}" class="text-blue-600">Terug naar overzicht</a></p>

</body>
</html>
