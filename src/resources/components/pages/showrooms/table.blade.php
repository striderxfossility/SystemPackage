<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Locatie
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($showrooms as $showroom)
            <x-table-body-row :link="route('showrooms.show', $showroom)">
                <x-table-body-column>
                    {{ $showroom->name }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $showroom->location }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>