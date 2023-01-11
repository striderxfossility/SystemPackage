<x-table-main>
    <x-table-head>
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
    </x-table-head>

    <x-table-body>
        @foreach($apis as $api)
            <x-table-body-row :link="route('groothuis.create', $api)">
                <x-table-body-column>
                    {{ $api->project }} {{ $api->omschrijving }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $api->klant_email }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $api->klant_telefoon }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $api->weeknr }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>