<x-layout-blocks-title>
    <i class="fa-solid fa-clone"></i> Producten
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="shadowproducten">
    @foreach($shadowproducten as $shadowproduct)
        <x-layout-block-small handle="handleShadowproduct cursor-move" :color="$shadowproduct->state == 'product' ? 'slate' : 'slate'">
            <x-input-text label="hidden" class="sortingShadowproduct" name="sortShadowproduct[{{ $shadowproduct->id }}]" :value="$shadowproduct->sort" />

            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/product/' . $shadowproduct->product->src) }}" />

            <div class="text-center mt-2">
                <div class="{{ $shadowproduct->state == 'product' ? 'text-red-500' : 'text-indigo-500' }}">{{ $shadowproduct->state == 'product' ? 'product' : 'dienst' }}</div>
                <div>{{ $shadowproduct->aantal }} x {{ $shadowproduct->product->name }}</div>
                <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVAT($shadowproduct->totals['verkoop']) !!} incl. btw</div>
            </div>
            <x-layout-blocks-button :url="route('shadowproducten.show', $shadowproduct)" color="blue" :bottom="true">
                Bekijken
            </x-layout-blocks-button>
        </x-layout-block-small>
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