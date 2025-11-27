<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Reservering bewerken
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
                    Vul hieronder de gegevens in om de reservering bij te werken.
                </p>
                @if(session('error'))
                    <div class="text-red-600 mb-4 text-2xl">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </section>
    </x-slot>
    {{-- Laravel form building --}}
    <div class="max-w-xl mx-auto">
        {{ html()->modelForm($reservation, 'PUT', route('reservations.update', $reservation->id))->class('')->open() }}
        @include('reservations._form')

        {{ html()->closeModelForm() }}

        <p class="text-center mt-6">
            <a href="{{ route('reservations.index') }}" class="text-blue-600 hover:underline">
                Terug naar overzicht
            </a>
        </p>
    </div>
</x-app-layout>
