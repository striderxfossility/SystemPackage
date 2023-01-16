<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Dag
            </x-table-head-column>
            <x-table-head-column>
                Tijd
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($timeblocks as $timeblock)
            <x-table-body-row :link="route('timeblockss.edit', $timeblock)">
                <x-table-body-column>
                    @switch($timeblock->day)
                        @case(1)
                            Maandag
                            @break
                        @case(2)
                            Dinsdag
                            @break
                        @case(3)
                            Woensdag
                            @break 
                        @case(4)
                            Donderdag
                            @break 
                        @case(5)
                            Vrijdag
                            @break
                        @case(6)
                            Zaterdag
                            @break
                    @endswitch
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timeblock->time_from }} - {{ $timeblock->time_to }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>