<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Oud
            </x-table-head-column>
            <x-table-head-column>
                Standaard
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
        @foreach($sills as $sill)
            <x-table-body-row :link="route('sills.edit', $sill)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/sill/' . $sill->src) }}" />
                    <div class="inline-block">{{ $sill->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {!! $sill->old == 1 ? '<span class="text-green-500">Ja</span>' : '<span class="text-red-500">Nee</span>' !!}
                </x-table-body-column>
                <x-table-body-column>
                    {!! $sill->default == 1 ? '<span class="text-green-500">Ja</span>' : '<span class="text-red-500">Nee</span>' !!}
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($sill->inkoop) }} excl. btw
                </x-table-body-column>
                <x-table-body-column>
                    {{ \App\Services\PriceService::display($sill->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>