<x-app-layout>
    <x-slot name="header">
        {{-- code van https://tailwindflex.com/@kali-design/faq-accordion-component --}}
        <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl mt-10">
                    Veel gestelde vragen
                </h2>
            </div>
        </div>
    </x-slot>

    {{-- code van https://tailwindflex.com/@kali-design/faq-accordion-component --}}
    <section class="py-10 bg-white-50 sm:py-16">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-3xl mx-auto mt-8 space-y-4">
                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question1" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span class="flex text-lg font-semibold text-black">Kan je buiten eten op het terras?</span>
                        <svg id="arrow1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="answer1" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p>Ja, bij temperaturen boven de 22 graden serveren wij standaard op het terras.
                            Als je een reservering maakt, houden wij automatisch een plekje op het terras voor je vrij.
                            Je hoeft hier zelf niets extra’s voor te doen.</p>
                    </div>
                </div>

                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question2" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span class="flex text-lg font-semibold text-black">Wat zijn de betaalmogelijkheden?</span>
                        <svg id="arrow2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="answer2" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p>Wij accepteren geen cash, maar alleen pin en creditcard betalingen.</p>
                    </div>
                </div>

                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question3" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span class="flex text-lg font-semibold text-black">Zijn jullie een veganistisch restaurant?</span>
                        <svg id="arrow3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="answer3" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p>Nee, wij zijn geen specifiek veganistisch of vegetarisch restaurant.
                            Wij koken overwegend vegetarisch, maar vullen ons menu vaak aan met vis/vlees/gevogelte, zorgvuldig geselecteerd door onze chef.
                            Mocht je vegetarisch of veganistisch willen eten, dan vragen wij je dit voorafgaand aan je reservering door te geven.</p>
                    </div>
                </div>

                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50">
                    <button type="button" id="question4" data-state="closed" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                        <span class="flex text-lg font-semibold text-black">Hoe vaak wisselt het menu?</span>
                        <svg id="arrow4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="answer4" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                        <p>Ons menu wisselt mee met de seizoenen en de beschikbaarheid uit onze eigen teelt.
                            Hierdoor wisselen wij dus regelmatig onze gerechten gedurende het seizoen.</p>
                    </div>
                </div>
            </div>

            <p class="text-center text-gray-600 text-base mt-9">
                Nog steeds vragen?
                <a href="{{ route('support') }}"
                   class="cursor-pointer font-medium text-tertiary transition-all duration-200 hover:text-tertiary focus:text-tertiary underline hover:no-underline">
                    Contact ons hier
                </a>
            </p>
        </div>

        {{-- JavaScript om het antwoord te laten zien --}}
        <script>
            document.querySelectorAll('[id^="question"]').forEach(function(button, index) {
                button.addEventListener('click', function() {
                    var answer = document.getElementById('answer' + (index + 1));
                    var arrow = document.getElementById('arrow' + (index + 1));

                    if (answer.style.display === 'none' || answer.style.display === '') {
                        answer.style.display = 'block';
                        arrow.style.transform = 'rotate(0deg)';
                    } else {
                        answer.style.display = 'none';
                        arrow.style.transform = 'rotate(-180deg)';
                    }
                });
            });
        </script>
    </section>
    @include('includes._reservation-modal')
</x-app-layout>
