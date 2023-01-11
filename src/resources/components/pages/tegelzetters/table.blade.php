<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Naam
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>
    <x-table-body>
        @foreach($tegelzetters as $tegelzetter)

            @if($offer->exists)
                @php($link = route('tegelzetters.addToOffer', [$tegelzetter, $offer]))
            @else
                @php($link = route('tegelzetters.edit', $tegelzetter))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    <img class="h-10 inline" src="{{ asset('img/settings/tegelzetter/' . $tegelzetter->src) }}" />
                    {{ $tegelzetter->name }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>