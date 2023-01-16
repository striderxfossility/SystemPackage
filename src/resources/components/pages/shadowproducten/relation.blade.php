<x-blocks-title>
    <i class="fa-solid fa-clone"></i> Producten
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="shadowproducten">
    @foreach($shadowproducten as $shadowproduct)
        <x-block-small handle="handleShadowproduct cursor-move" :color="$shadowproduct->state == 'product' ? 'slate' : 'slate'">
            <x-input-text label="hidden" class="sortingShadowproduct" name="sortShadowproduct[{{ $shadowproduct->id }}]" :value="$shadowproduct->sort" />

            @if(isset($shadowproduct->product))
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/product/' . $shadowproduct->product->src) }}" />
            @endif

            <div class="text-center mt-2">
                <div class="{{ $shadowproduct->state == 'product' ? 'text-red-500' : 'text-indigo-500' }}">{{ $shadowproduct->state == 'product' ? 'product' : 'dienst' }}</div>
                @if($shadowproduct->teruggave_actief)
                <div class="font-bold">TERUGGAVE</div>
                @endif
                <div>
                    @if($shadowproduct->teruggave_actief)
                    -
                    @endif
                    {{ $shadowproduct->aantal }} x {{ isset($shadowproduct->product) ? $shadowproduct->product->name : 'Geen product' }}</div>
                <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVAT($shadowproduct->totals['verkoop']) !!} incl. btw</div>
            </div>
            <x-blocks-button :url="route('api.shadowproducts.add', $shadowproduct)" color="orange">
                Voeg product toe
            </x-blocks-button>
            <x-blocks-button :url="route('api.shadowproducts.substract', $shadowproduct)" color="orange">
                verwijder 1 product
            </x-blocks-button>
            <x-blocks-button :url="route('shadowproducten.show', $shadowproduct)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    window.addEventListener("load", (event) => {
        var el = document.getElementById('shadowproducten')

        var sortable = new Sortable(el, 
        {
            handle: '.handleShadowproduct',
            onEnd: function (evt) 
            {
                var sort_array = []
                var i = 0
                Array.from(document.getElementsByClassName("sortingShadowproduct")).forEach(
                    function(element, index, array) 
                    {
                        sort_array.push({
                            'id': parseInt(element.name.replace('sortShadowproduct[', '').replace(']', '')),
                            'value': parseInt(i),
                        })
                        i++
                    }
                );

                jQuery.ajax({
                    url: "{{ route('api.sort.set') }}",
                    method: 'post',
                    data: 
                    {
                        arr: sort_array,
                        table: 'shadowproducts',

                    },
                    success: function(result) 
                    {
                    }
                })
            }
        })
    })
</script>