<x-table-main>
    <x-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                kleur
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                naam
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-table-head>

    <x-table-body>
        @foreach($colors as $color)

            <x-table-body-row :link="route('colors.edit', $color)">
                <x-table-body-column>
                    <div style="color:{{ $color->color }};">{{ $color->color }}</div>
                </x-table-body-column>
                <x-table-body-column>
                    {{ $color->name }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>