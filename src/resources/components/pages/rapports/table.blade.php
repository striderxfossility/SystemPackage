<x-layout-table-main>
    <x-layout-table-head>
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
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($rapports as $rapport)
            <x-layout-table-body-row :link="route('rapports.edit', $rapport)">
                <x-layout-table-body-column>
                    {{ $rapport->user->name }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $rapport->name }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $rapport->projectnummer }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $rapport->datum }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $rapport->sanitair_pakket }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $rapport->rapportroom_count }}
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>