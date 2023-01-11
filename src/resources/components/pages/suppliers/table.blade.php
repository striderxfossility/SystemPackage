<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($suppliers as $supplier)
            <x-layout-table-body-row :link="route('suppliers.edit', $supplier)">
                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/supplier/' . $supplier->src) }}" />
                    <div class="inline-block">{{ $supplier->name }}</div>
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>