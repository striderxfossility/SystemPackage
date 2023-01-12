<x-blocks-title>
    <i class="fa-brands fa-buffer"></i> Offertes
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($offers as $offer)
        <x-block-small>
            <div class="text-center mt-2">
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/pdf.png') }}" />
                <div class="mt-2">{{ $offer->name }} {{ $offer->number }}</div>
                @if($offer->bedrag)
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVat($offer->bedrag) !!} incl. btw</div>
                @endif
                @if($offer->total)
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::display($offer->total) !!} excl. btw</div>
                @endif
            </div>
            <x-blocks-button :url="route('offers.show', $offer)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>