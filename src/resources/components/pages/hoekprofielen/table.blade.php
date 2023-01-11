<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Inkoop
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Prijs
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($hoekprofielen as $hoekprofiel)
            <x-layout-table-body-row :link="route('hoekprofielen.edit', $hoekprofiel)">
                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/hoekprofiel/' . $hoekprofiel->src) }}" />
                    <div class="inline-block">{{ $hoekprofiel->name }}</div>
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ \App\Services\PriceService::display($hoekprofiel->inkoop) }} excl. btw
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ \App\Services\PriceService::display($hoekprofiel->verkoop) }} excl. btw
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>