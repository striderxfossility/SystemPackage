<x-blocks-title>
    <i class="fa-solid fa-basket-shopping"></i> Producten
</x-blocks-title>

<div class="md:grid md:grid-cols-4 md:gap-6">
    @foreach ($stockproducts as $stockproduct)
        <a class="block border-2 border-slate-300 bg-slate-50 hover:bg-slate-100 rounded p-2 mt-2" href="{{ route('stockproducts.edit', $stockproduct) }}">
            <div class="text-xs font-bold">{{ $stockproduct->amount }} x {{ $stockproduct->stock->article }} {{ $stockproduct->stock->name }}</div>
            <div><img width="50" class="inline my-2" style="vertical-align: middle" src="{{ asset('img/settings/stock/' . $stockproduct->stock->src) }}" /></div>
            <div class="text-xs">Prijs: {{ \App\Services\PriceService::display($stockproduct->price) }} excl. btw per stuk</div>
            <div class="text-xs">Totaal: {{ \App\Services\PriceService::display($stockproduct->price * $stockproduct->amount) }} excl. btw</div>
        </a>
    @endforeach
</div>