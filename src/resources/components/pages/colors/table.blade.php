<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                kleur
            </x-table-head-column>
            <x-table-head-column>
                naam
            </x-table-head-column>
        </x-table-head-row>
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