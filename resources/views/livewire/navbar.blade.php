<div>
    <div class="w-full mx-auto  2xl:max-w-7xl">
        <div x-data="{ open: false }"
            class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="text-lg tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                    href="/">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/sksu_logo.png') }}" class="h-14 w-14" alt="">
                        <h1 class="font-bold text-4xl text-green-600 font-protest">VSMS</h1>
                    </div>
                </a>
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600 lg:ml-auto"
                    href="#">
                    About
                </a>
                <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                    Contact
                </a>
                <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                    Documentation
                </a>

                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" type="button"
                                class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">
                                    Open user menu
                                </span>
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                    alt="">
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95" style="display: none"
                            class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">
                                Your Profile
                            </a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">
                                Settings
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">
                                    Sign out
                                </a>
                            </form>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>
