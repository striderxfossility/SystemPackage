<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                project
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                email
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                telefoon
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                opleverweek
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($apis as $api)
            <x-layout-table-body-row :link="route('groothuis.create', $api)">
                <x-layout-table-body-column>
                    {{ $api->project }} {{ $api->omschrijving }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $api->klant_email }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $api->klant_telefoon }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $api->weeknr }}
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>