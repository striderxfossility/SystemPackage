<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>
    <x-layout-table-body>
        @foreach($tegelzetters as $tegelzetter)

            @if($offer->exists)
                @php($link = route('tegelzetters.addToOffer', [$tegelzetter, $offer]))
            @else
                @php($link = route('tegelzetters.edit', $tegelzetter))
            @endif

            <x-layout-table-body-row :link="$link">
                <x-layout-table-body-column>
                    <img class="h-10 inline" src="{{ asset('img/settings/tegelzetter/' . $tegelzetter->src) }}" />
                    {{ $tegelzetter->name }}
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>