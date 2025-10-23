{{-- code afkomstig van https://flowbite.com/docs/components/navbar/ --}}
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/chef-man-cap.svg" class="h-8" alt="Chef logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Restaurant Dennis</span>
        </a>

        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg
                   md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200
                   dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row items-center p-4 md:p-0 mt-4 border border-gray-100
                       rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white
                       dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li><a href="{{ route('dishes.index') }}" class="block py-2 px-3 md:p-0 text-gray-900 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500">Menu</a></li>
                <li><a href="{{ route('faq') }}" class="block py-2 px-3 md:p-0 text-gray-900 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500">FAQ</a></li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 px-3 md:p-0 text-green-600 font-semibold hover:underline dark:text-green-400">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block py-2 px-3 md:p-0 text-red-600 hover:underline dark:text-red-400">
                                    Uitloggen
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 md:p-0 text-blue-600 font-semibold hover:underline dark:text-blue-400">
                                Inloggen
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 px-3 md:p-0 text-blue-600 hover:underline dark:text-blue-400">
                                    Registreren
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>
