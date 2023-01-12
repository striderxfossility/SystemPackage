<x-blocks-title>
    <i class="fa-brands fa-buffer"></i> Facturen
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($invoices as $invoice)
        <x-block-small>
            <div class="text-center mt-2">
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/pdf.png') }}" />
                <div class="mt-2">Factuur {{ $invoice->number }}</div>
                @if($invoice->total)
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::display($invoice->total) !!} excl. btw</div>
                @endif
            </div>
            <x-blocks-button :url="route('invoices.show', $invoice)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>