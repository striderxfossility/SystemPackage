<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Inkoop
            </x-table-head-column>
            <x-table-head-column>
                Prijs
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($montageprijzen as $montageprijs)
            <x-table-body-row :link="route('montageprijzen.edit', $montageprijs)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/montageprijs/' . $montageprijs->src) }}" />
                    <div class="inline-block">{{ $montageprijs->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($montageprijs->inkoop) }} excl. btw
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($montageprijs->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>