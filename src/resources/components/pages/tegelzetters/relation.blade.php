<x-blocks-title>
    <i class="fa-solid fa-hammer"></i> Tegelzetters
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($tegelzetters as $tegelzetter)
        <x-block-small>
            <img style="margin:0 auto; height:200px; width:200px;" src="{{ asset('img/settings/tegelzetter/' . $tegelzetter->src) }}" />
            <div class="text-center mt-2">
                <div>{{ $tegelzetter->name }}</div>
            </div>
            <x-blocks-button :url="route('tegelzetters.removeFromOffer', [$tegelzetter, $offer])" color="red" :bottom="true">
                Verwijderen
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>