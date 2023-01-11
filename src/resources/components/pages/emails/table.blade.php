<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Variant
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($emails as $email)
            <x-layout-table-body-row :link="route('mails.edit', $email)">
                <x-layout-table-body-column>
                    {{ $email->name }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    <span class='text-yellow-600'>{{ $email->class }}</span><br /><span class='text-indigo-600 uppercase'>{{ $email->default == 1 ? 'Default' : '' }}</span>
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>