<x-blocks-title>
    <i class="fa-brands fa-buffer"></i> Samgengestelde artikelen
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="packages">
    @foreach($packages as $package)
        <x-block-small handle="handlePackage cursor-move">
            <x-input-text label="hidden" class="sortingPackage" name="sortPackage[{{ $package->id }}]" :value="$package->sort" />
            <div class="text-center mt-2">
                <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/package/' . $package->src) }}" />
                <div class="mt-2">{{ $package->name }}</div>
                    {{ $package->shadowproduct->count() }} producten/diensten
                @if($package->bedrag)
                    <x-check-priceload :offer="$package->room->offer" />
                    <div class="text-xs text-slate-700">{!! \App\Services\PriceService::displayVat($package->bedrag) !!} incl. btw</div>
                @endif
            </div>
            <x-blocks-button :url="route('packages.show', $package)" color="blue" :bottom="true">
                Bekijken
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    window.addEventListener("load", (event) => {
        var el = document.getElementById('packages')

        var sortable = new Sortable(el, 
        {
            handle: '.handlePackage',
            onEnd: function (evt) 
            {
                var sort_array = []
                var i = 0
                Array.from(document.getElementsByClassName("sortingPackage")).forEach(
                    function(element, index, array) 
                    {
                        sort_array.push({
                            'id': parseInt(element.name.replace('sortPackage[', '').replace(']', '')),
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