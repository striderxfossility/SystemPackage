<x-layout-blocks-title>
    <i class="fa-solid fa-clone"></i> Tegels
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($tiles as $tile)
        <x-layout-block-small>
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/tile/' . $tile->src) }}" />
            <div class="text-center mt-2">
                <div>{{ $tile->name }} {{ $tile->formaat }}</div>
                <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVAT($tile->verkoop) !!} incl. btw</div>
            </div>
        </x-layout-block-small>
    @endforeach
</div>