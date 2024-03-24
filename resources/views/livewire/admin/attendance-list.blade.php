<div x-data>

    <div class="bg-white p-5 rounded-lg bg-opacity-50 shadow">
        <div class="flex justify-end space-x-3 items-center">
            <div class="w-64">
                <x-native-select label="" wire:model.live="user_type">

                    <option>Select an option</option>

                    <option>faculty</option>

                    <option>student</option>

                    <option>visitor</option>

                </x-native-select>
            </div>
            <div>
                <x-button label="Generate Report" @click="printOut($refs.printContainer.outerHTML);" dark
                    icon="document-text" />
            </div>
        </div>
        <div class="mt-5 bg-white  w-full" x-ref="printContainer">
            <div class="border-x border-t  items-end  p-2 pb-5">
                <div class="flex space-x-3 justify-center  items-center">
                    <img src="{{ asset('images/sksu_logo.png') }}" class="h-20" alt="">
                    <div class="text-center">
                        <h1>Republic of the Philippines</h1>
                        <h1 class="font-bold text-xl">SULTAN KUDARAT STATE UNIVERSITY</h1>
                        <h1 class="">College of Computer Studies Isulan Campus
                            Isulan</h1>
                        <h1 class="">
                            Isulan, Sultan Kudarat</h1>
                    </div>

                    <div>
                        <img src="{{ asset('images/ccs.jpg') }}" class="h-20 w-20 flex-shrink-0" alt="">
                    </div>
                </div>
                <div class="mt-10 text-center">
                    <h1 class="uppercase text-xl font-bold text-gray-700">Vehicle attendance</h1>
                </div>
            </div>

            <table class="w-full">
                <thead class="font-normal">
                    <tr>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            Fullname</th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            User type
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            Date
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            Time In
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            Time out
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            Status
                        </th>


                    </tr>
                </thead>
                <tbody class="">
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($attendances as $list)
                        <tr>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">{{ $i++ }}
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                {{ $list->fullname }}
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                {{ $list->user_type }}
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                {{ \Carbon\Carbon::parse($list->created_at)->format('F d, Y ') }}
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                {{ \Carbon\Carbon::parse($list->time_in)->format('h:i A') }}
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">

                                @if ($list->time_out == null)
                                    --
                                @else
                                    {{ \Carbon\Carbon::parse($list->time_out)->format('h:i A') }}
                                @endif
                            </td>
                            <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                {{ $list->status }}
                            </td>
                            @if ($list->user_type == 'visitor')
                                @if ($list->status != 'done')
                                    <td class="border-2 text-sm  text-gray-700  px-3 py-1">
                                        <x-button icon="logout" wire:click="timeout({{ $list->id }})"
                                            spinner="timeout({{ $list->id }})" />
                                    </td>
                                @endif
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border-2 text-sm  text-gray-700  px-3 py-1">
                                <span class="text-center">No Records Available</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    {{-- @dump($user_type) --}}
</div>
