<div>

    <div class="bg-white p-5 rounded-lg bg-opacity-50 shadow">
        {{-- <div class="flex justify-end">
            <div class="w-64">
                <x-native-select label="" wire:model.live="user_type">

                    <option>Select an option</option>

                    <option>faculty</option>

                    <option>student</option>

                    <option>visitor</option>

                </x-native-select>
            </div>
        </div> --}}
        <div class="mt-5">
            {{ $this->table }}
        </div>
    </div>
    {{-- @dump($user_type) --}}
</div>
