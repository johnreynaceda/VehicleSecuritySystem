<div>
    <x-button label="Edit Records" class="mt-2" wire:click="editData" spinner="editData" sm slate icon="pencil-alt" />
    <x-modal wire:model.defer="edit_data" align="center" max-width="4xl">
        <x-card title="Edit Information">
            <div class="grid 2xl:grid-cols-3 grid-cols-1 gap-4">
                <x-input label="Full Name" wire:model="fullname" placeholder="" />
                <x-input label="Contact" wire:model="contact" placeholder="" />
                <x-input label="Gmail Account" placeholder="" wire:model="gmail" />
                <div class="2xl:col-span-3"></div>
                <x-input label="Vehicle Model" placeholder="" wire:model="model" />
                <x-input label="Plate Number" placeholder="" wire:model="plate" />
                <x-input label="ORCR" placeholder="" wire:model="orcr" />
                <x-input label="License Number" placeholder="" wire:model="license" />

            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button dark wire:click="updateRecord" label="Update Record" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
