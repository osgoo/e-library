<header class="col-span-5 row-start-1 px-6 py-4 bg-white dark:bg-gray-700 shadow flex items-center justify-between sticky top-0 z-10">

    <div class="flex items-center space-x-6">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center text-gray-800 dark:text-white space-x-2">
                <svg class="w-8 h-8 fill-current text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M19 11.2V5c0-1.1-.9-2-2-2H3c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h4.5c.3 0 .5-.2.5-.5v-4c0-.3.2-.5.5-.5H8v-2h-.5c-.3 0-.5-.2-.5-.5V8c0-.3.2-.5.5-.5h4c.3 0 .5.2.5.5v1.5c0 .3-.2.5-.5.5H12v2h.5c.3 0 .5.2.5.5v4c0 .3-.2.5-.5.5H17c1.1 0 2-.9 2-2V11c0-.3-.2-.5-.5-.5H11v-1h7.5c.3 0 .5.2.5.5zM7 11.5c0 .3-.2.5-.5.5H3V5h14v6H8.5c-.3 0-.5.2-.5.5V11zM13 8v1.5h2V8h-2z"/></svg>
                <span class="font-bold text-xl hidden sm:inline">Номын сан</span>
            </a>
        </div>

        <div class="relative w-64 md:w-96">
            <form action="{{ route('search') }}" method="GET" class="flex items-center">
                <input name="search" class="w-full py-2 pl-10 pr-4 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-500" type="text" placeholder="Ном хайх...">
                <button type="submit" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none"><path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @keydown.escape.window="open = false" class="flex items-center text-sm focus:outline-none">
                    <span class="mr-2 text-gray-700 dark:text-gray-300 hidden md:inline">{{ Auth::user()->name }}</span>
                    <svg class="w-8 h-8 rounded-full text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <svg class="w-4 h-4 ml-1 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                <div x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none"
                    style="display: none;"
                    x-cloak>
                    <div class="py-1">
                        @if(Auth::user())
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Админ хэсэг</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Гарах
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Админ эрх</a>
        @endauth
    </div>
</header>
