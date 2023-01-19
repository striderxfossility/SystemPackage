<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                status
            </x-table-head-column>
            <x-table-head-column>
                offerte
            </x-table-head-column>
            <x-table-head-column>
                contact
            </x-table-head-column>
            <x-table-head-column>
                project
            </x-table-head-column>
            @if(isset($offers->first()->room_count))
                <x-table-head-column>
                    ruimtes
                </x-table-head-column>
            @endif
            <x-table-head-column>
                bedrag
            </x-table-head-column>
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
                        {!! \Jelle\Strider\StateService::offer($offer->state) !!}
                    @else
                        Template
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    @if($offer->template)
                        {{ $offer->template_name }}
                    @else
                        {{ $offer->name }} {{ $offer->fullNumber }}
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    @if(!$offer->template)
                        @if ($offer->contact != null)
                            @if(!class_exists('App\Enums\ContactState'))
                                <div class="text-blue-700">
                                    <i class="fa-solid fa-user pr-2"></i> 
                                        {{ $offer->contact->aanhef }} {{ $offer->contact->achternaam }}
                                </div>
                            @else
                                <div class="text-blue-700">
                                    @if ($offer->contact != null)
                                        @if($offer->contact->state != \App\Enums\ContactState::Company->value)
                                            <i class="fa-solid fa-user pr-2"></i> {{ $offer->contact->first_name }} {{ $offer->contact->last_name }}
                                        @endif
                                    @endif  
                                </div>
                                <div class="text-purple-700">
                                    @if ($offer->contact != null)
                                        @if($offer->contact->state == \App\Enums\ContactState::Company->value)
                                            <i class="fa-solid fa-building pr-2"></i> {{ $offer->contact->first_name }}
                                        @else
                                            @if ($offer->company != null)
                                                <i class="fa-solid fa-building pr-2"></i> {{ $offer->company->first_name }}
                                            @elseif($offer->contact->company != null)
                                                <i class="fa-solid fa-building pr-2"></i> {{ $offer->contact->company->first_name }}
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endif
                            @if($offer->contact->des == 1)
                                <div class="text-purple-700"><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                            @endif
                            @if($offer->contact->des == 2)
                                <div class="text-purple-700"><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                            @endif
                        @endif  
                    @endif
                </x-table-body-column>

                @if(!$offer->template)
                    @if ($offer->contact != null)
                        @if($offer->contact->groothuis)
                            <x-table-body-column>
                                {{ $offer->contact->groothuis->project }} - {{ $offer->contact->groothuis->omschrijving }}
                            </x-table-body-column>
                        @else
                            <x-table-body-column>
                                {{ $offer->client_reference }}
                            </x-table-body-column>
                        @endif
                    @endif
                @else
                    <x-table-body-column />
                @endif

                @if(isset($offer->room_count))
                    <x-table-body-column>
                        {{ $offer->room_count }}
                    </x-table-body-column>
                @endif

                <x-table-body-column>
                    @if ($offer->template == 0 && isset($offer->room_count))
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

                        @if($offer->total)
                            {!! \App\Services\PriceService::displayVAT($offer->total) !!} incl. btw
                        @endif
                    @endif
                </x-table-body-column>

            </x-table-body-row>

        @endforeach
    </x-table-body>
</x-table-main>