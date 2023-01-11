<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($suppliers as $supplier)
            <x-table-body-row :link="route('suppliers.edit', $supplier)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/supplier/' . $supplier->src) }}" />
                    <div class="inline-block">{{ $supplier->name }}</div>
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>