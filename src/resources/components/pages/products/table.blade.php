<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Leverancier
            </x-table-head-column>
            <x-table-head-column>
                Soort
            </x-table-head-column>
            <x-table-head-column>
                Naam
            </x-table-head-column>
            <x-table-head-column>
                Inkoop
            </x-table-head-column>
            <x-table-head-column>
                Verkoop
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>
    <x-table-body>
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

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/supplier/' . $product->supplier->src) }}" />
                    <div class="inline-block">{{ $product->supplier->name }}</div>
                </x-table-body-column>

                <x-table-body-column>
                    <div class="uppercase {{ $product->state == \App\Enums\ProductState::Product->value ? 'text-red-500' : 'text-indigo-500'}}">{{ $product->state == 'product' ? 'product' : 'dienst' }}</div>
                </x-table-body-column>

                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/product/' . $product->src) }}" /> 
                    <div class="inline-block">{{ $product->name }}</div>
                </x-table-body-column>

                <x-table-body-column>
                    {{ \App\Services\PriceService::display($product->inkoop) }} excl. btw
                </x-table-body-column>

                <x-table-body-column>
                    {{ \App\Services\PriceService::display($product->verkoop) }} excl. btw
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>