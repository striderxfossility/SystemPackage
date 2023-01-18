<x-blocks-title>
    <i class="fa-solid fa-clone"></i> Uren
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2">
    @foreach($timesheets as $timesheet)
        <x-block-small>
            <div class="text-center mt-2">
                <div>{{ $timesheet->user->name }}</div>
                <div class="text-xs text-slate-700">
                    <div>{{ $timesheet->minutes }} minuten</div>
                    <div>{{ $timesheet->activities }}</div>
                    <div>{{ \App\Services\DateService::get($timesheet->from) }} van {{ $timesheet->from_1 }}:{{ $timesheet->from_2 }} tot {{ $timesheet->to_1 }}:{{ $timesheet->to_2 }}</div>
                </div>
            </div>
            <x-blocks-button :url="route('timesheets.edit', $timesheets)" color="blue" :bottom="true">
                aanpassen
            </x-blocks-button>
        </x-block-small>

        @if($timesheet->saw_min > 0)
            <x-block-small>
                <div class="text-center mt-2">
                    <div>Zaagmachine</div>
                    <div class="text-xs text-slate-700">
                        <div>{{ $timesheet->saw_min }} minuten</div>
                        <div>{{ \App\Services\DateService::get($timesheet->from) }}</div>
                    </div>
                </div>
            </x-block-small>
        @endif
    @endforeach
</div>