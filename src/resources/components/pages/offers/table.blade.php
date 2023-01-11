<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-layout.table.head-column>
                status
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                offerte
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                contact
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                project
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                ruimtes
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                bedrag
            </x-layout.table.head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($offers as $offer)

            @if($offerOriginal->exists)
                @php($link = route('offers.copyFromTemplate', [$offerOriginal, $offer]))
            @else
                @php($link = route('offers.show', $offer))
            @endif

            <x-table-body-row :link="$link">

                <x-table-body-column>
                    @if(!$offer->template)
                        {{ $offer->state }}
                    @else
                        Template
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    @if($offer->template)
                        {{ $offer->template_name }}
                    @else
                        {{ $offer->name }} {{ $offer->number }}
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    @if(!$offer->template)
                        @if ($offer->contact != null)
                            <div><i class="fa-solid fa-user pr-2"></i> {{ $offer->contact->aanhef }} {{ $offer->contact->achternaam }}</div>
                        @endif  
                        @if($offer->contact->des == 1)
                            <div><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                        @endif
                        @if($offer->contact->des == 2)
                            <div><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                        @endif
                    @endif
                </x-table-body-column>

                @if(!$offer->template)
                    @if($offer->contact->groothuis)
                        <x-table-body-column>
                            {{ $offer->contact->groothuis->project }} - {{ $offer->contact->groothuis->omschrijving }}
                        </x-table-body-column>
                    @else
                        <x-table-body-column />
                    @endif
                @else
                    <x-table-body-column />
                @endif

                <x-table-body-column>
                    {{ $offer->room_count }}
                </x-table-body-column>

                <x-table-body-column>
                    @if ($offer->template == 0)
                        @if ($offer->status > 2)
                            @if ($offer->count_products - $offer->count_open_products == $offer->count_products)
                                <div class="text-green-600 font-bold">
                                    alle producten zijn besteld: {{ $offer->count_products - $offer->count_open_products }} / {{ $offer->count_products }}
                                </div>
                            @else
                                <div class="text-red-600 font-bold">
                                    bestelde nodige producten: {{ $offer->count_products - $offer->count_open_products }} / {{ $offer->count_products }}
                                </div>
                            @endif

                            @if ($offer->count_tiles - $offer->count_open_tiles == $offer->count_tiles)
                                <div class="text-green-600 font-bold">
                                    alle tegels zijn besteld: {{ $offer->count_tiles - $offer->count_open_tiles }} / {{ $offer->count_tiles }}
                                </div>
                            @else
                                <div class="text-red-600 font-bold">
                                    bestelde nodige tegels: {{ $offer->count_tiles - $offer->count_open_tiles }} / {{ $offer->count_tiles }}
                                </div>
                            @endif
                        @else
                            @if($offer->bedrag)
                                {!! \App\Services\PriceService::displayVAT($offer->bedrag) !!} incl. btw
                            @endif
                        @endif
                    @else
                        @if($offer->bedrag)
                            {!! \App\Services\PriceService::displayVAT($offer->bedrag) !!} incl. btw
                        @endif
                    @endif
                </x-table-body-column>

            </x-table-body-row>

        @endforeach
    </x-table-body>
</x-table-main>