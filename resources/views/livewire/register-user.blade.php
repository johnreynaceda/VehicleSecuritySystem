<div>
    <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div class="absolute bottom-5 left-5">
            <h1 class="font-bold 2xl:text-4xl text-2xl text-green-600 opacity-50">SULTAN KUDARAT STATE UNIVERSITY
            </h1>
        </div>
        <x-shared.background class="h-[90rem] absolute -right-96 -top-60 2xl:opacity-100 opacity-30" />


        <div class="w-full sm:max-w-3xl mt-6 px-6 py-5 relative bg-white shadow-2xl overflow-hidden sm:rounded-lg">
            <header class="flex space-x-2 items-center text-green-600">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M1 6a3 3 0 013-3h12a3 3 0 013 3v8a3 3 0 01-3 3H4a3 3 0 01-3-3V6zm4 1.5a2 2 0 114 0 2 2 0 01-4 0zm2 3a4 4 0 00-3.665 2.395.75.75 0 00.416 1A8.98 8.98 0 007 14.5a8.98 8.98 0 003.249-.604.75.75 0 00.416-1.001A4.001 4.001 0 007 10.5zm5-3.75a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zm0 6.5a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zm.75-4a.75.75 0 000 1.5h2.5a.75.75 0 000-1.5h-2.5z"
                        clip-rule="evenodd"></path>
                </svg>
                <h1 class="text-xl font-semibold uppercase">Register User</h1>
            </header>
            <div class="mt-3">
                {{ $this->form }}
            </div>
        </div>
    </div>

</div>
