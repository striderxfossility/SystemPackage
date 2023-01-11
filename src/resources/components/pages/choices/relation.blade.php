<x-layout-blocks-title>
    <i class="fa-solid fa-crosshairs"></i> Keuzes
</x-layout-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($choices as $choice)
        <x-layout-block-small>
            <div class="text-center mt-2">
                <div>{{ $choice->name }}</div>
                <div class="text-xs text-slate-700">
                    {{ count($choice->products) }} producten<br />
                    {{ $choice->restricted == 1 ? 'VERPLICHT KIEZEN' : 'NIET VERPLICHT' }}
                </div>
            </div>
            <x-layout-blocks-button :url="route('choices.show', $choice)" color="blue" :bottom="true">
                Bekijken
            </x-layout-blocks-button>
        </x-layout-block-small>
    @endforeach
</div>