<x-table-main>
    <x-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Verkoper
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Familie
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Projectnummer
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Datum
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Pakket
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Ruimtes
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-table-head>

    <x-table-body>
        @foreach($rapports as $rapport)
            <x-table-body-row :link="route('rapports.edit', $rapport)">
                <x-table-body-column>
                    {{ $rapport->user->name }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $rapport->name }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $rapport->projectnummer }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $rapport->datum }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $rapport->sanitair_pakket }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $rapport->rapportroom_count }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>