<x-blocks-title>
    <i class="fa-solid fa-clone"></i> Tegels
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="shadowtegels">
    @foreach($shadowtegels as $shadowtegel)
        <x-block-small handle="handleShadowtegel cursor-move">
            <x-input-text label="hidden" class="sortingShadowtegel" name="sortShadowtegel[{{ $shadowtegel->id }}]" :value="$shadowtegel->sort" />

            @if(isset($shadowtegel->tile))
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/tile/' . $shadowtegel->tile->src) }}" />
            @endif

            <div class="text-center mt-2">
                <div>
                    {{ $shadowtegel->squared_meters }} m² 

                    @if(isset($shadowtegel->tile))
                        {{ $shadowtegel->tile->name }}
                    @else
                        Geen tegel gekoppeld
                    @endif
                </div>
                @if($shadowtegel->bedrag)
                    <x-check-priceload :offer="$shadowtegel->room->offer" />
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVAT($shadowtegel->bedrag) !!} incl. btw</div>
                @endif
            </div>
            <x-blocks-button :url="route('shadowtegels.show', $shadowtegel)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    window.addEventListener("load", (event) => {
        var el = document.getElementById('shadowtegels')

        var sortable = new Sortable(el, 
        {
            handle: '.handleShadowtegel',
            onEnd: function (evt) 
            {
                var sort_array = []
                var i = 0
                Array.from(document.getElementsByClassName("sortingShadowtegel")).forEach(
                    function(element, index, array) 
                    {
                        sort_array.push({
                            'id': parseInt(element.name.replace('sortShadowtegel[', '').replace(']', '')),
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
                        table: 'shadowtegels',

                    },
                    success: function(result) 
                    {
                    }
                })
            }
        })
    })
</script>