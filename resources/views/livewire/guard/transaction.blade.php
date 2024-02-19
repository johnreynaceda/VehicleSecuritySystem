<div>
    <div class="mt-10">
        <x-button label="Visitor Add" right-icon="user" positive class="font-semibold uppercase" rounded md />
    </div>
    <div class="grid place-content-center">
        <img src="{{ asset('images/scanner1.gif') }}" alt="" class=" object-cover" srcset="">

        <input type="text" class="text-center" name="" wire:model.live="identification" autofocus
            id="">
    </div>
</div>
