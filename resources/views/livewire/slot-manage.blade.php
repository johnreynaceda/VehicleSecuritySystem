<div>
    <div class="w-64">
        <x-input label="No. of Slots" wire:model.live="slots" />
    </div>
    <div class="mt-5 w-96">
        <div class="border-2 rounded-xl p-6 shadow-xl border-green-600">
            <h1 class="font-bold text-gray-700">Remaining Slots</h1>
            <h1 class="mt-5 text-7xl text-green-600 font-bold text-center">
                {{ $this->slots }}
            </h1>
        </div>
    </div>
</div>
