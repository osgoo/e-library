<header class="flex h-16 w-full items-center justify-between border-b border-gray-700 bg-gray-800 px-6">

    <form action="{{ route('admin.search') }}" method="GET" class="flex flex-row w-full justify-start">
        @csrf

        <input name="search" class="w-full rounded-full border border-gray-700 bg-gray-700 py-2 pl-10 pr-4 text-gray-200 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:w-64" type="text" placeholder="Ном хайх...">
        <button type="submit">
            <svg class="ml-auto h-5 px-4 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-9x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path></svg>
        </button>
    </form>

    <div class="flex items-center">
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = ! open"
                class="flex items-center space-x-2 rounded-md p-2 text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                <img class="h-8 w-8 rounded-full object-cover"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff"
                    alt="{{ Auth::user()->name }}">
                <span class="hidden font-medium text-white md:block">{{ Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <div x-show="open"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-gray-700 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                 style="display: none;"
                 @click="open = false">


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        class="block w-full px-4 py-2 text-left text-sm text-gray-200 hover:bg-gray-600 hover:text-white"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</header>
