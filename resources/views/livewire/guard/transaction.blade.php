<div>
    <div class="mt-10">
        <x-button label="Visitor Add" wire:click="$set('visitor_modal', true)" right-icon="user" positive
            class="font-semibold uppercase" rounded md />
    </div>
    <div class="grid place-content-center">
        <img src="{{ asset('images/scanner1.gif') }}" alt="" class=" object-cover" srcset="">

        <input type="text" class="text-center" name="" wire:model.live="identification" autofocus
            id="">
    </div>

    <x-modal wire:model.defer="visitor_modal" align="center" max-width="3xl">
        <x-card title="Visitor">
            <div class="grid grid-cols-2 gap-5">
                <x-input label="Full Name" wire:model="fullname" placeholder="" />
                <x-input label="Address" wire:model="address" placeholder="" />
                <x-input label="Vehicle Model" placeholder="" wire:model="model" />
                <x-input label="Plate Number" placeholder="" wire:model="plate_number" />
                <x-input label="ORCR" placeholder="" wire:model="orcr" />
                <x-input label="License Number" placeholder="" wire:model="license" />
                <x-input label="Gmail Account" placeholder="" wire:model="account" />
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button positive right-icon="arrow-right" class="font-semibold" wire:click="visitorIn"
                        spinner="visitorIn" label="In Visitor" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
