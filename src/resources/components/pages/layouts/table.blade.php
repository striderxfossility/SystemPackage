<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Naam
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($layouts as $layout)
            <x-table-body-row :link="route('layouts.edit', $layout)">
                <x-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/layout/' . $layout->src) }}" />
                    <div class="inline-block">{{ $layout->name }}</div>
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>