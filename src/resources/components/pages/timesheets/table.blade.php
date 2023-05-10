<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Gebruiker
            </x-table-head-column>
            <x-table-head-column>
                Van
            </x-table-head-column>
            <x-table-head-column>
                Tot
            </x-table-head-column>
            <x-table-head-column>
                Categorie
            </x-table-head-column>
            <x-table-head-column>
                Werk
            </x-table-head-column>
            <x-table-head-column>
                Werkzaamheden
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($timesheets as $timesheet)

            @if(\Auth::user() != null)
                @php($link = route('timesheets.edit', $timesheet))
            @else
                @php($link = route('tegelzetter.timesheets.edit', $timesheet))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    @if($timesheet->user != null)
                        {{ $timesheet->user->name }}
                    @else
                        {{ $timesheet->tegelzetter->name }}
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timesheet->from_1 }}:{{ $timesheet->from_2 }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timesheet->to_1 }}:{{ $timesheet->to_2 }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timesheet->category_id }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timesheet->work }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $timesheet->activities }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>