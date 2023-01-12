<x-blocks-title>
    <i class="fa-brands fa-buffer"></i> werkbonnen
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($workorders as $workorder)
        <x-block-small>
            <div class="text-center mt-2">
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/pdf.png') }}" />
                <div class="mt-2">Werkbon {{ !is_array($workorder) ? $workorder->fullNumber : $workorder['fullNumber'] }}</div>
                @if(!is_array($workorder) ? $workorder->total : isset($workorder['total']))
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::display(!is_array($workorder) ? $workorder->total : $workorder['total']) !!} excl. btw</div>
                @endif
            </div>

            @if(!is_array($workorder))
                @php($link = route('workorders.show', $workorder))
            @else
                @php($link = route('workorders.goto', $workorder['id']))
            @endif

            <x-blocks-button :url="$link" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>