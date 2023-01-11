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
        @foreach($lijms as $lijm)
            <x-table-body-row :link="route('lijms.edit', $lijm)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/lijm/' . $lijm->src) }}" />
                    <div class="inline-block">{{ $lijm->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($lijm->inkoop) }} excl. btw
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($lijm->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>