{{-- code afkomstig van https://flowbite.com/docs/components/footer/ --}}
<footer class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-8 lg:py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Contactgegevens --}}
            <div>
                <h2 class="mb-4 text-sm font-semibold uppercase">Contact</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Rijndijk 12, 3606 PG Utrecht</p>
                <p class="text-gray-600 dark:text-gray-400 mb-2">(030) 309 98 38</p>
                <p class="text-gray-600 dark:text-gray-400">restaurant@dennis.nl</p>
            </div>

            {{-- Openingstijden --}}
            <div>
                <h2 class="mb-4 text-sm font-semibold uppercase text-center">
                    Openingstijden restaurant
                </h2>

                @php
                    use App\Models\OpeningHour;
                    $openingHours = OpeningHour::all();
                @endphp

                <ul class="text-gray-600 dark:text-gray-400 font-medium text-center space-y-1">
                    @foreach ($openingHours as $hour)
                        <li>
                            {{ $hour->day }}:
                            @if ($hour->closed)
                                gesloten
                            @else
                                {{ $hour->open }} t/m {{ $hour->close }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- test kolom --}}
            <div class="text-right">
                <div class="inline-block text-left">
                    <h2 class="mb-4 text-sm font-semibold uppercase">Test kolom</h2>
                    <ul class="text-gray-600 dark:text-gray-400 font-medium space-y-1">
                        <li>test kolom 1</li>
                        <li>test kolom 2</li>
                        <li>test kolom 3</li>
                        <li>test kolom 4</li>
                        <li>test kolom 5</li>
                        <li>test kolom 6</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500 dark:text-gray-400">
            © 2025 Restaurant - Dennis
        </div>
    </div>
</footer>
