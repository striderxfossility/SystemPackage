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
            <x-table-head-column>
                bedrag
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($invoices as $invoice)
            <x-table-body-row :link="route('invoices.show', $invoice)">
                <x-table-body-column>
                    {{ $invoice->state }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $invoice->name }} {{ $invoice->number }}
                </x-table-body-column>

                <x-table-body-column>
                    @if ($invoice->contact != null)
                        <div><i class="fa-solid fa-user pr-2"></i> {{ $invoice->contact->aanhef }} {{ $invoice->contact->achternaam }}</div>
                        @if($invoice->contact->des == 1)
                            <div><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                        @endif
                        @if($invoice->contact->des == 2)
                            <div><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                        @endif
                    @endif  
                </x-table-body-column>
                    @if(isset($invoice->contact))
                        @if($invoice->contact->groothuis)
                            <x-table-body-column>
                                {{ $invoice->contact->groothuis->project }} - {{ $invoice->contact->groothuis->omschrijving }}
                            </x-table-body-column>
                        @else
                            <x-table-body-column />
                        @endif
                    @endif
                <x-table-body-column>
                    @if($invoice->bedrag)
                        {!! \App\Services\PriceService::displayVAT($invoice->bedrag) !!} incl. btw
                    @endif
                </x-table-body-column>
            </x-table-body-row>

        @endforeach
    </x-table-body>
</x-table-main>