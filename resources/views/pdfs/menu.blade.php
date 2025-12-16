<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menukaart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">

<h1 class="text-4xl font-bold text-center mb-8">Menu Dennis</h1>

<div class="max-w-xl mx-auto space-y-6">
    @foreach($dishes as $dish)
        <div>
            <p class="font-bold">{{ $dish->name }} €{{ $dish->price }}</p>
            <p>{{ $dish->description }}</p>

            <p class="text-sm mt-1">
                <strong>Allergieën:</strong>
                @if($dish->recipe)
                    @foreach($dish->recipe->ingredients as $ingredient)
                        @foreach($ingredient->allergies as $allergy)
                            {{ $allergy->name }}
                        @endforeach
                    @endforeach
                @else
                    Geen
                @endif
            </p>
        </div>

        @if(!$loop->last)
            <hr class="border-black my-4">
        @endif
    @endforeach
</div>

</body>
</html>
