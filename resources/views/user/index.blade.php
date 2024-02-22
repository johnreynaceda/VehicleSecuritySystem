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
        <x-button label="Edit Records" class="mt-2" sm slate icon="pencil-alt" />
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
                <h1 class="uppercase text-lg text-gray-700 font-bold">
                    {{ auth()->user()->vehicleInformation->orcr }}</h1>
            </div>
            <div>
                <h1 class="text-sm">License Number</h1>
                <h1 class="uppercase text-lg text-gray-700 font-bold">
                    {{ auth()->user()->vehicleInformation->license }}</h1>
            </div>
        </div>
        <div class="mt-10 grid 2xl:grid-cols-3 2xl:gap-5 gap-2 grid-cols-1">
            <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
                <img src="{{ Storage::url(auth()->user()->vehicleInformation->front_view_path) }}"
                    class="h-full w-full absolute left-0 top-0 object-cover" alt="">
                <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                    <span class="font-bold text-gray-700 uppercase">Front View</span>
                </div>
            </div>
            <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
                <img src="{{ Storage::url(auth()->user()->vehicleInformation->back_view_path) }}"
                    class="h-full w-full absolute left-0 top-0 object-cover" alt="">
                <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                    <span class="font-bold text-gray-700 uppercase">Back View</span>
                </div>
            </div>
            <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
                <img src="{{ Storage::url(auth()->user()->vehicleInformation->side_view_path) }}"
                    class="h-full w-full absolute left-0 top-0 object-cover" alt="">
                <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                    <span class="font-bold text-gray-700 uppercase">Side View</span>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
