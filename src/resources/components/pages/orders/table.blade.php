<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                nummer
            </x-table-head-column>
            <x-table-head-column>
                Offerte
            </x-table-head-column>
            <x-table-head-column>
                Producten
            </x-table-head-column>
            <x-table-head-column>
                Leverancier
            </x-table-head-column>
            <x-table-head-column>
                Lever datum
            </x-table-head-column>
            <x-table-head-column>
                Wordt verstuurd op
            </x-table-head-column>
            <x-table-head-column>
                Lever adres
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($orders as $order)
            <x-table-body-row :link="route('orders.show', $order)">
                <x-table-body-column>
                    Bestelbon {{ $order->id }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $order->offer != null ? $order->offer->number : 'Geen' }}
                </x-table-body-column>
                <x-table-body-column>
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
                </x-table-body-column>
                <x-table-body-column>
                    @if ( $order->supplier_id != 0)
                        <img class="h-10 inline" src="{{ asset('img/settings/supplier/' . $order->supplier->src) }}" />
                        {{ $order->supplier->name }}
                    @else   
                        Voorraad
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    @if($order->afroep)
                        <div class="text-yellow-500">Op afroep</div>
                    @else
                        {{ \Jelle\Strider\DateService::get($order->delivery_date) }}
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    @if($order->send_auto)
                        <div class="text-yellow-500">{{ \Jelle\Strider\DateService::get($order->send_date) }}</div>
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    {{ $order->straat }} te {{ $order->plaats }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>