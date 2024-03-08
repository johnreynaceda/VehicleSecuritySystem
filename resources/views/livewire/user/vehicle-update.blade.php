<div>
    <div class="mt-10 grid 2xl:grid-cols-3 2xl:gap-5 gap-2 grid-cols-1">
        <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
            <img src="{{ Storage::url(auth()->user()->vehicleInformation->front_view_path) }}"
                class="h-full w-full absolute left-0 top-0 object-cover" alt="">
            <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                <span class="font-bold text-gray-700 uppercase">Front View</span>
            </div>
            <div class="absolute right-2 top-2">
                <x-button.circle icon="pencil-alt" positive wire:click="updateView('front_view')"
                    spinner="updateView('front_view')" />
            </div>
        </div>
        <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
            <img src="{{ Storage::url(auth()->user()->vehicleInformation->back_view_path) }}"
                class="h-full w-full absolute left-0 top-0 object-cover" alt="">
            <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                <span class="font-bold text-gray-700 uppercase">Back View</span>
            </div>
            <div class="absolute right-2 top-2">
                <x-button.circle icon="pencil-alt" positive wire:click="updateView('back_view')"
                    spinner="updateView('back_view')" />
            </div>
        </div>
        <div class="border border-gray-600 relative h-40 overflow-hidden rounded-xl border-dashed p-4">
            <img src="{{ Storage::url(auth()->user()->vehicleInformation->side_view_path) }}"
                class="h-full w-full absolute left-0 top-0 object-cover" alt="">
            <div class="absolute bottom-0 left-0 bg-white px-3 py-2 bg-opacity-80 w-full">
                <span class="font-bold text-gray-700 uppercase">Side View</span>
            </div>
            <div class="absolute right-2 top-2">
                <x-button.circle icon="pencil-alt" positive wire:click="updateView('side_view')"
                    spinner="updateView('side_view')" />
            </div>
        </div>
    </div>

    <x-modal wire:model.defer="open_modal">
        <x-card title="{{ $view_get }}">
            <div>
                @php
                    $view = null;
                    switch ($view_get) {
                        case 'front_view':
                            $view = auth()->user()->vehicleInformation->front_view_path;
                            break;

                        case 'back_view':
                            $view = auth()->user()->vehicleInformation->back_view_path;
                            break;
                        case 'side_view':
                            $view = auth()->user()->vehicleInformation->side_view_path;
                            break;

                        default:
                            # code...
                            break;
                    }
                @endphp

                <img src="{{ Storage::url($view) }}" class="h-40 w-96 object-cover" alt="">
                <div class="mt-5">
                    {{ $this->form }}
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button dark wire:click="updateRecord" spinner="updateRecord" label="Update Record" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
