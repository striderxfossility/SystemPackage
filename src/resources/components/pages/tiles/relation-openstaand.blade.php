<x-layout-blocks-title>
    <i class="fa-solid fa-cubes"></i> openstaande tegels
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($tiles as $tile)
        <x-layout-block-small color="red">
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/tile/' . $tile->src) }}" />
            <div class="text-center mt-2">
                <div>{{ $tile->name }}</div>
                <div class="text-xs text-slate-700">
                    <div>{{ $tile->amount }} tegels</div>
                    <div>{{ $tile->formaat }}</div>
                    {!! \App\Services\PriceService::displayVAT($tile->amount * $tile->verkoop) !!} incl. btw
                </div>
            </div>
            <x-layout-blocks-button :url="route('orders.addTile', [$order, $tile, $tile->amount])" color="blue" :bottom="true">
                Toevoegen
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>