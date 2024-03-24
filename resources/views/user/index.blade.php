@section('title', 'Dashboard')
<x-user-layout>
    <div class="p-5 2xl:mx-0 mx-2 bg-gradient-to-bl from-green-600 to-transparent rounded-xl border-2">
        <div class="flex space-x-3 items-center">
            <div class="bg-white h-16 w-16 relative shadow-lg rounded-full overflow-hidden">
                <img src="{{ asset('images/sample.png') }}" class="h-full w-full object-cover " alt="">
            </div>
            <div>
                <h1 class="uppercase font-bold text-lg text-gray-700 underline">{{ auth()->user()->name }}</h1>
                <h1 class="uppercase text-sm font-semibold text-gray-500">
                    {{ auth()->user()->user_type }}({{ auth()->user()->identification }})</h1>
            </div>
        </div>
    </div>
    <div
        class="p-5 2xl:mx-0 mx-2 border-2 bg-white bg-opacity-80 border-green-600 mt-5 rounded-xl flex justify-center items-center">
        <div>
            {{ QrCode::size(250)->generate(auth()->user()->identification) }}
        </div>
    </div>
    <div class="mt-5 mx-4 2xl:mx-0">
        <header class="font-bold text-xl text-green-600">VEHICLE INFORMATION</header>
        <livewire:user.edit-detail />
        <div class="mt-4 grid grid-cols-2 gap-5">
            <div>
                <h1 class="text-sm">Model</h1>
                <h1 class="uppercase text-lg text-gray-700 font-bold">{{ auth()->user()->vehicleInformation->model }}
                </h1>
            </div>
            <div>
                <h1 class="text-sm">Plate Number</h1>
                <h1 class="uppercase text-lg text-gray-700 font-bold">
                    {{ auth()->user()->vehicleInformation->plate_number }}</h1>
            </div>
            <div>
                <h1 class="text-sm">ORCR</h1>
                <div class="flex space-x-2 items-center">
                    <h1 class="uppercase text-lg text-gray-700 font-bold">
                        {{ auth()->user()->vehicleInformation->orcr }}</h1>
                    <a href="{{ Storage::url(auth()->user()->vehicleInformation->proof_of_orcr) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 text-green-600"
                            fill="currentColor">
                            <path
                                d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V11H19L18.9999 6.413L11.2071 14.2071L9.79289 12.7929L17.5849 5H13V3H21Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h1 class="text-sm">License Number</h1>
                <div class="flex space-x-2 items-center">
                    <h1 class="uppercase text-lg text-gray-700 font-bold">
                        {{ auth()->user()->vehicleInformation->license }}</h1>
                    <a href="{{ Storage::url(auth()->user()->vehicleInformation->proof_of_license) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 text-green-600"
                            fill="currentColor">
                            <path
                                d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V11H19L18.9999 6.413L11.2071 14.2071L9.79289 12.7929L17.5849 5H13V3H21Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full">
            <livewire:user.vehicle-update />
        </div>

    </div>
</x-user-layout>
