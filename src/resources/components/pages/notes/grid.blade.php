@if($notes != null)
    @if(count($notes) > 0)
        <div class="text-xs font-bold col-span-2 mt-2">Notities</div>
        <div class="grid grid-cols-3 gap-2">
            @foreach ($notes as $note)
                <x-block-small color="yellow">
                    @if($note->user != null)
                        <div class="font-bold">{{ $note->user->name }}</div>
                    @endif
                    <div>{!! \App\Services\OfferService::text($note->description) !!}</div>
                    <div class="text-slate-500">{{ \Jelle\Strider\DateService::get($note->created_at) }}</div>
                    <x-blocks-button :bottom="true" :url="route('notes.edit', $note)" color="yellow">
                        Aanpassen
                    </x-blocks-button>
                </x-block-small>
            @endforeach
        </div>
    @endif
@endif