<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-layout.table.head-column>
                Naam
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Producten
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                Bedrag
            </x-layout.table.head-column>
        </x-table-head-row>
    </x-table-head>
    <x-table-body>
        @foreach($packages as $package)
        
            @if(Route::current()->getName() == 'packages.indexFromRoom' || Route::current()->getName() == 'packages.searchFromRoom')
                @php($link = route('packages.selectFromRoom', [$room, $package]))
            @else
                @php($link = route('packages.show', $package))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
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
                </x-table-body-column>
                <x-table-body-column>
                    {{ $package->shadowproduct()->count() }}
                </x-table-body-column>
                <x-table-body-column>
                    @if($package->bedrag)
                        {!! \App\Services\PriceService::displayVAT($package->bedrag) !!} incl. btw
                    @endif
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>