<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Leverancier
            </x-table-head-column>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Formaat
            </x-table-head-column>
            <x-table-head-column>
                Inkoop
            </x-table-head-column>
            <x-table-head-column>
                Verkoop
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($tiles as $tile)
            @if(Route::current()->getName() == 'shadowtegels.createFromRoom' || Route::current()->getName() == 'shadowtegels.searchFromRoom')
                @php($link = route('shadowtegels.storeFromRoom', [$room, $tile]))
            @else
                @php($link = route('tiles.edit', $tile))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    @if (isset($tile->supplier->src))
                        <img class="inline-block h-10" src="{{ asset('img/settings/supplier/' . $tile->supplier->src) }}" />
                        <div class="inline-block">{{ $tile->supplier->name }}</div>
                    @else
                        <div class="inline-block">Geen leverancier</div>
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/tile/' . $tile->src) }}" /> 
                    <div class="inline-block">{{ $tile->name }}</div>
                </x-table-body-column>

                <x-table-body-column>
                    {{ $tile->formaat }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ \App\Services\PriceService::display($tile->doos_inkoop) }} excl. btw
                </x-table-body-column>

                <x-table-body-column>
                    {{ \App\Services\PriceService::display($tile->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>