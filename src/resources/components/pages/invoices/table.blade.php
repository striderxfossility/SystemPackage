<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                status
            </x-table-head-column>
            <x-table-head-column>
                factuur
            </x-table-head-column>
            <x-table-head-column>
                contact
            </x-table-head-column>
            <x-table-head-column>
                project
            </x-table-head-column>
            <x-table-head-column>
                @if(isset($invoices->first()->openstaand))
                    openstaand
                @else
                    bedrag
                @endif
            </x-table-head-column>
            <x-table-head-column>
                factuurdatum
            </x-table-head-column>
            <x-table-head-column>
                herinneringsdatum
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($invoices as $invoice)
            <x-table-body-row :link="route('invoices.show', $invoice)">
                <x-table-body-column>
                    {!! \Jelle\Strider\StateService::offer($invoice->state) !!}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $invoice->name }} {{ $invoice->number }}
                </x-table-body-column>

                <x-table-body-column>
                    @if(!$invoice->template)
                        @if ($invoice->contact != null)
                            @if(!class_exists('App\Enums\ContactState'))
                                <div class="text-blue-700">
                                    <i class="fa-solid fa-user pr-2"></i> 
                                        {{ $invoice->contact->aanhef }} {{ $invoice->contact->achternaam }}
                                </div>
                            @else
                                <div class="text-blue-700">
                                    @if ($invoice->contact != null)
                                        @if($invoice->contact->state != \App\Enums\ContactState::Company->value)
                                            <i class="fa-solid fa-user pr-2"></i> {{ $invoice->contact->first_name }} {{ $invoice->contact->last_name }}
                                        @endif
                                    @endif  
                                </div>
                                <div class="text-purple-700">
                                    @if ($invoice->contact != null)
                                        @if($invoice->contact->state == \App\Enums\ContactState::Company->value)
                                            <i class="fa-solid fa-building pr-2"></i> {{ $invoice->contact->first_name }}
                                        @else
                                            @if ($invoice->company != null)
                                                <i class="fa-solid fa-building pr-2"></i> {{ $invoice->company->first_name }}
                                            @elseif($invoice->contact->company != null)
                                                <i class="fa-solid fa-building pr-2"></i> {{ $invoice->contact->company->first_name }}
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            @endif
                        
                            @if($invoice->contact->des == 1)
                                <div class="text-purple-700"><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                            @endif
                            @if($invoice->contact->des == 2)
                                <div class="text-purple-700"><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                            @endif
                        @endif  
                    @endif
                </x-table-body-column>
                @if(!$invoice->template)
                    @if ($invoice->contact != null)
                        @if($invoice->contact->groothuis)
                            <x-table-body-column>
                                {{ $invoice->contact->groothuis->project }} - {{ $invoice->contact->groothuis->omschrijving }}
                            </x-table-body-column>
                        @else
                            <x-table-body-column>
                                {{ $invoice->client_reference }}
                            </x-table-body-column>
                        @endif
                    @endif
                @else
                    <x-table-body-column />
                @endif
                <x-table-body-column>
                    @if(isset($invoice->openstaand))
                        {!! \App\Services\PriceService::display($invoice->openstaand * 1.21) !!} incl. btw
                    @else

                        @if($invoice->bedrag)
                            {!! \App\Services\PriceService::displayVAT($invoice->bedrag) !!} incl. btw
                        @endif

                        @if($invoice->total)
                            @if(url('/') == 'https://backend.weerstandgrafmonumenten.nl' || url('/') == 'https://backend.badkamer.studio')
                                {!! \App\Services\PriceService::display($invoice->total) !!}  incl. btwt
                            @else
                                {!! \App\Services\PriceService::displayVAT($invoice->total) !!}  incl. btw
                            @endif
                        @endif
                    @endif
                </x-table-body-column>
                <x-table-body-column>
                    {{ \Jelle\Strider\DateService::get($invoice->sended) }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ \Jelle\Strider\DateService::get($invoice->reminded) }}
                </x-table-body-column>
            </x-table-body-row>

        @endforeach
    </x-table-body>
</x-table-main>