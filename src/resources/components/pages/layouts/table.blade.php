<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($layouts as $layout)
            <x-layout-table-body-row :link="route('layouts.edit', $layout)">
                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/layout/' . $layout->src) }}" />
                    <div class="inline-block">{{ $layout->name }}</div>
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>