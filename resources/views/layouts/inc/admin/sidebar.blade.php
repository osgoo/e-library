<aside class="flex h-screen w-64 flex-col overflow-y-auto border-r border-gray-700 bg-gray-800 px-5 py-8">
    <a href="#" class="flex items-center justify-center h-16">
        <span class="text-2xl font-bold text-white">Админ хуудас</span>
    </a>

    <div class="mt-6 flex flex-1 flex-col justify-between">
        <nav class="-mx-3 space-y-2">
            <a class="flex transform items-center rounded-lg px-3 py-2 transition-colors duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                href="{{ route('admin.dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span class="mx-2 text-sm font-medium">Нүүр</span>
            </a>

            <a class="flex transform items-center rounded-lg px-3 py-2 transition-colors duration-300 {{ request()->routeIs('admin.users.*') ? 'bg-gray-900 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                href="{{ route('admin.category') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.003c0 1.113.285 2.16.786 3.07M15 19.128v.003c0-1.113.285-2.16.786-3.07M9 14.25a3 3 0 00-3-3h-1.5a3 3 0 00-3 3v4.5a3 3 0 003 3h1.5a3 3 0 003-3v-4.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM9 14.25v4.5a3 3 0 003 3h1.5a3 3 0 003-3v-4.5" />
                </svg>
                <span class="mx-2 text-sm font-medium">Номын төрөл</span>
            </a>

            <a class="flex transform items-center rounded-lg px-3 py-2 transition-colors duration-300 {{ request()->routeIs('admin.products.*') ? 'bg-gray-900 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                href="{{ route('admin.book') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
                <span class="mx-2 text-sm font-medium">Номын жагсаалт</span>
            </a>

            <a class="flex transform items-center rounded-lg px-3 py-2 transition-colors duration-300 {{ request()->routeIs('admin.settings') ? 'bg-gray-900 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-1.003 1.11-1.226.55-.223 1.159-.223 1.71 0 .55.223 1.02.684 1.11 1.226M10.34 18.334c-1.147-.283-2.228-.73-3.21-1.332L5.43 18.22c-.64.64-1.68.34-1.91-.49l-1.06-3.63c-.09-.32.02-.66.23-.9l2.53-2.53c-.04-.32-.07-.65-.07-.98s.03-.66.07-.98L2.7 6.88c-.21-.24-.32-.58-.23-.9l1.06-3.63c.23-.83 1.27-1.13 1.91-.49l1.7 1.7c.98-.6 2.06-.05 3.21-1.33C12.8 3.34 14.07 3 15.4 3c.4 0 .79.04 1.17.11a5.6 5.6 0 00-.01 0M10.34 18.334c1.147.283 2.228.73 3.21 1.332l1.7-1.7c.64-.64 1.68-.34 1.91.49l1.06 3.63c.09.32-.02.66-.23.9l-2.53 2.53c.04.32.07.65.07.98s-.03.66-.07.98l2.53 2.53c.21.24.32.58.23.9l-1.06 3.63c-.23.83-1.27 1.13-1.91-.49l-1.7-1.7c-.98.6-2.06.05-3.21 1.33C11.2 20.66 9.93 21 8.6 21c-.4 0-.79-.04-1.17-.11a5.6 5.6 0 00.01 0" />
                </svg>
                <span class="mx-2 text-sm font-medium">Хэрэглэгчийн хуудас</span>
            </a>
        </nav>
    </div>
</aside>
