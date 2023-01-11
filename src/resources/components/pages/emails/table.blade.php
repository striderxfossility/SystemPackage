<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Variant
            </x-layout.table.head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($emails as $email)
            <x-table-body-row :link="route('mails.edit', $email)">
                <x-table-body-column>
                    {{ $email->name }}
                </x-table-body-column>
                <x-table-body-column>
                    <span class='text-yellow-600'>{{ $email->class }}</span><br /><span class='text-indigo-600 uppercase'>{{ $email->default == 1 ? 'Default' : '' }}</span>
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>