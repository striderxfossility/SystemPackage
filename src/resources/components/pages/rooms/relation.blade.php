<x-blocks-title>
    <i class="fa-brands fa-buffer"></i> Ruimtes
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="ruimtes">
    @foreach($rooms as $room)
        <x-block-small handle="handleRuimte cursor-move">
            <x-input-text label="hidden" class="sortingRuimte" name="sortRuimte[{{ $room->id }}]" :value="$room->sort" />
            @if($room->name == 'Toilet')
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/toilet.png') }}" />
            @else
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/badkamer.png') }}" />
            @endif

            <div class="text-center mt-2">
                <div>Ruimte {{ $room->nummer }} - {{ $room->name }}</div>
                @if($room->bedrag)
                    <x-check-priceload :offer="$room->offer" />
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVat($room->bedrag) !!} incl. btw</div>
                @endif
            </div>
            <x-blocks-button :url="route('rooms.show', $room)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    window.addEventListener("load", (event) => {
        var el = document.getElementById('ruimtes')

        var sortable = new Sortable(el, 
        {
            handle: '.handleRuimte',
            onEnd: function (evt) 
            {
                var sort_array = []
                var i = 0
                Array.from(document.getElementsByClassName("sortingRuimte")).forEach(
                    function(element, index, array) 
                    {
                        sort_array.push({
                            'id': parseInt(element.name.replace('sortRuimte[', '').replace(']', '')),
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
                        table: 'rooms',

                    },
                    success: function(result) 
                    {
                    }
                })
            }
        })
    })
</script>