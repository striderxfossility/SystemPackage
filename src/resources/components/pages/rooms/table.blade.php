<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Offerte
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Nummer
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Verkoop
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>
    <x-layout-table-body>
        @foreach($rooms as $room)

            @if(Route::current()->getName() == 'rooms.indexFromOffer' || Route::current()->getName() == 'rooms.searchFromOffer')
                @php($link = route('rooms.selectFromOffer', [$room, $offer]))
            @else
                @php($link = route('rooms.show', $room))
            @endif

            <x-layout-table-body-row :link="$link">
                <x-layout-table-body-column>
                    @if(isset($room->offer))
                        @if($room->offer->template)
                            <span style="color:blue">TEMPLATE</span>
                        @else
                            {{ $room->offer->number }}
                        @endif
                    @else
                        <span style="color:blue">TEMPLATE</span>
                    @endif
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $room->nummer }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    <img class="h-10 inline" src="{{ asset('img/' . ($room->name == 'Toilet' ? 'toilet.png' : 'badkamer.png')) }}" />
                    {{ $room->name }} {{ $room->template_name }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if($room->bedrag)
                        @if(isset($room->offer))
                            <x-check-priceload :offer="$room->offer" />
                        @endif
                        <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVat($room->bedrag) !!} incl. btw</div>
                    @endif
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>