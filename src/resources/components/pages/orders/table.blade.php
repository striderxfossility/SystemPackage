<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                nummer
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Offerte
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Producten
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Leverancier
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Lever datum
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Wordt verstuurd op
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Lever adres
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($orders as $order)
            <x-layout-table-body-row :link="route('orders.show', $order)">
                <x-layout-table-body-column>
                    Bestelbon {{ $order->id }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $order->offer != null ? $order->offer->number : 'Geen' }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if($order->offer != null)
                        @if ($order->count_products - $order->count_open_products == $order->count_products)
                            <div class="text-green-600">
                                Producten: {{ $order->count_products - $order->count_open_products }} / {{ $order->count_products }}
                            </div>
                        @else
                            <div class="text-red-600">
                                Producten: {{ $order->count_products - $order->count_open_products }} / {{ $order->count_products }}
                            </div>
                        @endif

                        @if ($order->count_tiles - $order->count_open_tiles == $order->count_tiles)
                            <div class="text-green-600">
                                Tegels: {{ $order->count_tiles - $order->count_open_tiles }} / {{ $order->count_tiles }}
                            </div>
                        @else
                            <div class="text-red-600">
                                Tegels: {{ $order->count_tiles - $order->count_open_tiles }} / {{ $order->count_tiles }}
                            </div>
                        @endif
                    @endif
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if ( $order->supplier_id != 0)
                        <img class="h-10 inline" src="{{ asset('img/settings/supplier/' . $order->supplier->src) }}" />
                        {{ $order->supplier->name }}
                    @else   
                        Voorraad
                    @endif
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if($order->afroep)
                        <div class="text-yellow-500">Op afroep</div>
                    @else
                        {{ \Jelle\Strider\DateService::get($order->delivery_date) }}
                    @endif
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if($order->send_auto)
                        <div class="text-yellow-500">{{ \Jelle\Strider\DateService::get($order->send_date) }}</div>
                    @endif
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $order->straat }} te {{ $order->plaats }}
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>