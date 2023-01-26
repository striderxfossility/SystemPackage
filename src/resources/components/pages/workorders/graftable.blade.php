<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Werkbonnummer
            </x-table-head-column>
            <x-table-head-column>
                Grafnummer
            </x-table-head-column>
            <x-table-head-column>
                Overlijdene
            </x-table-head-column>
            <x-table-head-column>
                Contact
            </x-table-head-column>
            <x-table-head-column>
                Acties
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($workorders as $workorder)
            <x-table-body-row>

                <x-table-body-column>
                    {{ $workorder['number'] }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $workorder['grave_number'] }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $workorder['name_deceased'] }}
                </x-table-body-column>

                <x-table-body-column>
                    <div class="text-blue-700 dark:text-blue-300">
                        @if ($workorder['contact'] != null)
                            @if($workorder['contact']['state'] != 'company')
                                <i class="fa-solid fa-user pr-2"></i> {{ $workorder['contact']['first_name'] }} {{ $workorder['contact']['last_name'] }}
                            @endif
                        @endif  
                    </div>
                    <div class="text-purple-700 dark:text-purple-300">
                        @if (isset($workorder['contact']))
                            @if($workorder['contact']['state'] == 'company')
                                <i class="fa-solid fa-building pr-2"></i> {{ $workorder['contact']['first_name'] }}
                            @else
                                @if (isset($workorder['company']))
                                    <i class="fa-solid fa-building pr-2"></i> {{ $workorder['contact']['first_name'] }}
                                @elseif(isset($workorder['contact']['company']))
                                    <i class="fa-solid fa-building pr-2"></i> {{ $workorder['contact']['company']['first_name'] }}
                                @endif
                            @endif
                        @endif
                    </div>
                </x-table-body-column>
                <x-table-body-column>
                    <button class="w-full text-xs mt-2 block text-center bg-red-500 hover:bg-red-400 rounded px-4 py-2 text-white shadow cursor-pointer" onclick="window.open('{{ env('API_GRAFMONUMENTEN') }}api/offers/{{ $workorder['number'] }}/workorder_pdf', '_blank').focus()">
                        Open PDF
                    </button>
                    <x-blocks-button :url="route('workorders.grafReady', $workorder['number'])" color="green">
                        Zet op klaar
                    </x-blocks-button>
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>