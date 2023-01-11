<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Verkoper
            </x-table-head-column>
            <x-table-head-column>
                Familie
            </x-table-head-column>
            <x-table-head-column>
                Projectnummer
            </x-table-head-column>
            <x-table-head-column>
                Datum
            </x-table-head-column>
            <x-table-head-column>
                Pakket
            </x-table-head-column>
            <x-table-head-column>
                Ruimtes
            </x-table-head-column>
        </x-table-head-row>
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