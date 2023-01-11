<x-layout-blocks-title>
    <i class="fa-solid fa-clone"></i> Producten
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($products as $product)
        <x-layout-block-small :color="$product->state == 'product' ? 'slate' : 'slate'">
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/product/' . $product->src) }}" />
            <div class="text-center mt-2">
                <div class="{{ $product->state == 'product' ? 'text-red-500' : 'text-indigo-500' }}">{{ $product->state == 'product' ? 'product' : 'dienst' }}</div>
                <div>{{ $product->name }}</div>
                <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVAT($product->verkoop) !!} incl. btw</div>
            </div>
            <x-layout-blocks-button :url="route('choices.deleteProduct', [$choice, $product])" color="red" :bottom="true">
                Verwijderen
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>