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

                    @php
                        if($order->offer != null)
                        {
                            $offer = $order->offer;

                            if($offer->contact->groothuis != null) {
                                $extra = ' ' . $offer->contact->groothuis->project . ' - ' . $offer->contact->groothuis->omschrijving;
                            } else {
                                if(isset($offer->contact))
                                {
                                    $extra .= ' ' . $offer->contact->aanhef . ' ' . $offer->contact->achternaam;
                                }
                            }

                            echo $extra;
                        }
                    @endphp
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