<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                kleur
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                naam
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($colors as $color)

            <x-layout-table-body-row :link="route('colors.edit', $color)">
                <x-layout-table-body-column>
                    <div style="color:{{ $color->color }};">{{ $color->color }}</div>
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $color->name }}
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>