<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Offerte
            </x-table-head-column>
            <x-table-head-column>
                Nummer
            </x-table-head-column>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Verkoop
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>
    <x-table-body>
        @foreach($rooms as $room)

            @if(Route::current()->getName() == 'rooms.indexFromOffer' || Route::current()->getName() == 'rooms.searchFromOffer')
                @php($link = route('rooms.selectFromOffer', [$room, $offer]))
            @else
                @php($link = route('rooms.show', $room))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    @if(isset($room->offer))
                        @if($room->offer->template)
                            <span style="color:blue">TEMPLATE</span>
                        @else
                            {{ $room->offer->number }}
                        @endif
                    @else
                        <span style="color:blue">TEMPLATE</span>
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    {{ $room->nummer }}
                </x-table-body-column>
                <x-table-body-column>
                    <img class="h-10 inline" src="{{ asset('img/' . ($room->name == 'Toilet' ? 'toilet.png' : 'badkamer.png')) }}" />
                    {{ $room->name }} {{ $room->template_name }}
                </x-table-body-column>
                <x-table-body-column>
                    @if($room->bedrag)
                        @if(isset($room->offer))
                            <x-check-priceload :offer="$room->offer" />
                        @endif
                        <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVat($room->bedrag) !!} incl. btw</div>
                    @endif
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>