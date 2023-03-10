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
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($layouts as $layout)
            <x-table-body-row :link="route('layouts.edit', $layout)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/layout/' . $layout->src) }}" />
                    <div class="inline-block">{{ $layout->name }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {!! $layout->old == 1 ? '<span class="text-green-500">Ja</span>' : '<span class="text-red-500">Nee</span>' !!}
                </x-table-body-column>
                <x-table-body-column>
                    {!! $layout->default == 1 ? '<span class="text-green-500">Ja</span>' : '<span class="text-red-500">Nee</span>' !!}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>