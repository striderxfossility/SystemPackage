<x-layout-blocks-title>
    <i class="fa-solid fa-cubes"></i> openstaande producten
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($products as $product)
        <x-layout-block-small color="red">
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/product/' . $product->src) }}" />
            <div class="text-center mt-2">
                <div>{{ $product->name }}</div>
                <div class="text-xs text-slate-700">
                    <div>{{ $product->amount }} stuk(s)</div>
                    {!! \App\Services\PriceService::displayVAT($product->amount * $product->verkoop) !!} incl. btw
                </div>
            </div>
            <x-layout-blocks-button :url="route('orders.addProduct', [$order, $product, $product->amount])" color="blue" :bottom="true">
                Toevoegen
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>