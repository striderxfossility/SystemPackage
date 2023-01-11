<x-table-main>
    <x-table-head>
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
    </x-table-head>

    <x-table-body>
        @foreach($hoekprofielen as $hoekprofiel)
            <x-table-body-row :link="route('hoekprofielen.edit', $hoekprofiel)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/hoekprofiel/' . $hoekprofiel->src) }}" />
                    <div class="inline-block">{{ $hoekprofiel->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($hoekprofiel->inkoop) }} excl. btw
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($hoekprofiel->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>