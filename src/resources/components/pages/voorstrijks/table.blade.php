<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Inkoop
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Prijs
            </x-layout.table.head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($voorstrijks as $voorstrijk)
            <x-table-body-row :link="route('voorstrijks.edit', $voorstrijk)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/voorstrijk/' . $voorstrijk->src) }}" />
                    <div class="inline-block">{{ $voorstrijk->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($voorstrijk->inkoop) }} excl. btw
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($voorstrijk->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>