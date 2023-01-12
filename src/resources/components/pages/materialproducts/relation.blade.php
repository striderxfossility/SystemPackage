<x-blocks-title>
    <i class="fa-solid fa-draw-polygon"></i> Maatwerk
</x-blocks-title>

<div class="md:grid md:grid-cols-2 md:gap-6">
    @foreach ($materialproducts as $materialproduct)
        <a class="md:border-2 md:border-slate-300 md:bg-slate-50 md:hover:bg-slate-100 p-2 mt-2" href="{{ route('materials.editProduct', $materialproduct) }}">
            <div class="text-xs font-bold">{{ $materialproduct->amount }} x {{ $materialproduct->name }}</div>
            <div class="md:grid md:grid-cols-2 md:gap-6">
                <div>
                    <div><img width="50" class="inline my-2" style="vertical-align: middle" src="{{ asset('img/settings/material/' . $materialproduct->material->src) }}" /></div>
                    <div class="text-xs">Prijs: {{ \App\Services\PriceService::display($materialproduct->price) }} excl. btw per stuk</div>
                    <div class="text-xs">Totaal: {{ \App\Services\PriceService::display($materialproduct->price * $materialproduct->amount) }} excl. btw</div>
                </div>
                <div class="mt-2">
                    @if(isset($materialproduct->rows))
                        @foreach($materialproduct->rows as $row)
                            <div class="text-gray-400 text-xs">
                                <div>{{ $row[0] }} {{ $row[1] }} {{ $row[2] }} {{ \App\Services\PriceService::display($row[3] * $row[0]) }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="md:grid md:grid-cols-2 md:gap-6 mt-4">
                <div>{!! \App\Services\RenderService::show(345, 345, $materialproduct->drawing[0], 'bovenaanzicht', $materialproduct->measurements[0], $materialproduct->measurements[1]) !!}</div>
                <div>{!! \App\Services\RenderService::show(345, 345, $materialproduct->drawing[1], 'doorsnede', $materialproduct->measurements[1], $materialproduct->measurements[2]) !!}</div>
            </div>
        </a>
    @endforeach
</div>