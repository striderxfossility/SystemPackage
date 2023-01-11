<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Leverancier
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Soort
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Inkoop
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Verkoop
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>
    <x-layout-table-body>
        @foreach($products as $product)

            @if(Route::current()->getName() == 'shadowproducten.createFromRoom' || Route::current()->getName() == 'shadowproducten.searchFromRoom')
                @php($link = route('shadowproducten.storeFromRoom', [$room, $product]))
            @elseif(Route::current()->getName() == 'shadowproducten.createFromSG' || Route::current()->getName() == 'shadowproducten.searchFromSG')
                @php($link = route('shadowproducten.storeFromSG', [$package, $product]))
            @elseif(Route::current()->getName() == 'choices.addProduct' || Route::current()->getName() == 'choices.searchFromChoice')
                @php($link = route('choices.addProductToChoice', [$choice, $product]))
            @else
                @php($link = route('producten.edit', $product))
            @endif

            <x-layout-table-body-row :link="$link">
                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/supplier/' . $product->supplier->src) }}" />
                    <div class="inline-block">{{ $product->supplier->name }}</div>
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    <div class="uppercase {{ $product->state == \App\Enums\ProductState::Product->value ? 'text-red-500' : 'text-indigo-500'}}">{{ $product->state == 'product' ? 'product' : 'dienst' }}</div>
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/product/' . $product->src) }}" /> 
                    <div class="inline-block">{{ $product->name }}</div>
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ \App\Services\PriceService::display($product->inkoop) }} excl. btw
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ \App\Services\PriceService::display($product->verkoop) }} excl. btw
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>