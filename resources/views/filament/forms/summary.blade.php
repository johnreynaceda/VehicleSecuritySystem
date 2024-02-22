<div class="grid grid-cols-3 gap-5">
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">User Type</h1>
        <h1 class="">{{ $this->user_type }}</h1>
    </div>
    <div></div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">ID Number</h1>
        <h1 class="">{{ $this->identification }}</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">Full Name</h1>
        <h1 class="">
            {{ $this->firstname . ' ' . ($this->middlename != null ? $this->middlename : '') . ' ' . $this->lastname }}
        </h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">Contact</h1>
        <h1 class="">{{ $this->contact }}</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">Email</h1>
        <h1 class="">{{ $this->email }}</h1>
    </div>
    <div class="col-span-3">
        <h1 class="font-bold uppercase text-main"> Vehicle Information</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">Vehicle Model</h1>
        <h1 class="">{{ $this->model }}</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">Plate Number</h1>
        <h1 class="">{{ $this->plate_number }}</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">ORCR</h1>
        <h1 class="">{{ $this->orcr }}</h1>
    </div>
    <div>
        <h1 class="text-sm text-gray-500 uppercase font-semibold">License Number</h1>
        <h1 class="">{{ $this->license }}</h1>
    </div>

</div>
