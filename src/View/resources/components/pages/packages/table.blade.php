<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Producten
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Bedrag
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>
    <x-layout-table-body>
        @foreach($packages as $package)
        
            @if(Route::current()->getName() == 'packages.indexFromRoom' || Route::current()->getName() == 'packages.searchFromRoom')
                @php($link = route('packages.selectFromRoom', [$room, $package]))
            @else
                @php($link = route('packages.show', $package))
            @endif

            <x-layout-table-body-row :link="$link">
                <x-layout-table-body-column>
                    <img class="inline-block h-10" src="{{ asset('img/settings/package/' . $package->src) }}" />
                    <div class="inline-block">
                        @if($package->room != null)
                            @if($package->room->offer != null)
                                @if($package->room->offer->template)
                                    <span style="color:blue">TEMPLATE</span>
                                @else
                                    {{ $package->room->nummer }} 
                                    {{ $package->room->name }}
                                    {{ $package->room->template_name }}
                                @endif
                            @else
                                <span style="color:blue">TEMPLATE</span>
                            @endif
                        @else
                            <span style="color:blue">TEMPLATE</span>
                        @endif    
                    </div>
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    {{ $package->shadowproduct()->count() }}
                </x-layout-table-body-column>
                <x-layout-table-body-column>
                    @if($package->bedrag)
                        {!! \App\Services\PriceService::displayVAT($package->bedrag) !!} incl. btw
                    @endif
                </x-layout-table-body-column>
            </x-layout-table-body-row>
        @endforeach
    </x-layout-table-body>
</x-layout-table-main>