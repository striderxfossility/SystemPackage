<x-blocks-title>
    <i class="fa-solid fa-truck-fast"></i> Inkopen
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($orders as $order)
        <x-block-small>
            <a href="{{ asset('img/settings/order/' . $order->src) }}">
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/order/' . $order->src) }}" />
            </a>
            <div class="text-center mt-2">
                @if ($order->state == \App\Enums\OrderState::Offer->value)
                    Offerte
                @endif

                @if ($order->state == \App\Enums\OrderState::Order->value)
                    Order
                @endif

                @if ($order->state == \App\Enums\OrderState::Invoice->value)
                    Factuur
                @endif
                {{ $order->company->first_name }}<br />
                {{ \App\Services\PriceService::display($order->value) }} excl. btw
            </div>
            <x-blocks-button :url="route('orders.destroy', $order)" color="red" :bottom="true">
                Verwijderen
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>