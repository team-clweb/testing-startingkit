<x-app-layout>
    <x-slot name="header">
        {{-- code afkomstig van https://flowbite.com/docs/components/jumbotron/ --}}
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Allergie aanmaken
                </h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl">
                    Vul hieronder de gegevens in om een nieuwe allergie toe te voegen.
                </p>
            </div>
        </section>
    </x-slot>

    {{ html()->form('POST', route('allergies.store'))->class('max-w-xl mx-auto')->open() }}

    @include('allergies._form')

    {{ html()->closeModelForm() }}

    <p class="text-center mt-6">
        <a href="{{ route('allergies.index') }}" class="text-blue-600 hover:underline">Terug naar overzicht</a>
    </p>
</x-app-layout>
