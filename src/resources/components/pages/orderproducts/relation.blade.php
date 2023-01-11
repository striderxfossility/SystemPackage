<x-layout-blocks-title>
    <i class="fa-solid fa-cubes"></i> Producten in bestelbon
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @php($products = array_column($order->offer->products($order->supplier->id), 'id'))
    @foreach($orderproducts as $orderproduct)
        <x-layout-block-small>
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/' . $orderproduct->src) }}" />
            <div class="text-center mt-2">
                <div>{{ $orderproduct->name }}</div>
                @if($orderproduct->stock > 0)
                    <div>Vanuit voorraad</div>
                @endif
                @if($orderproduct->model == 'Product' && !in_array($orderproduct->model_id, $products))
                    <div class="text-red-500 font-bold">Niet meer aanwezig in offerte!</div>
                @endif
                <div class="text-xs text-slate-700">
                    <div>{{ $orderproduct->amount }} stuk(s)</div>
                    <div>{!! \App\Services\PriceService::displayVAT($orderproduct->price * $orderproduct->amount) !!} incl. btw</div>
                </div>
            </div>
            <x-layout-blocks-button :url="route('orderproducts.show', $orderproduct)" color="blue" :bottom="true">
                Bekijken
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>