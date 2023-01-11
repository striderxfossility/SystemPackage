<x-layout-blocks-title>
    <i class="fa-solid fa-truck-fast"></i> Bestelbonnen
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($orders as $order)
        <x-layout-block-small>
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/supplier/' . $order->supplier->src) }}" />
            <div class="text-center mt-2">
                {{ $order->supplier->name }}
            </div>
            <x-layout-blocks-button :url="route('orders.show', $order)" color="blue" :bottom="true">
                Bekijken
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>