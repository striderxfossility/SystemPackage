<x-layout-table-main>
    <x-layout-table-head>
        <x-layout.table.head-row>
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
                bedrag
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-layout-table-head>

    <x-layout-table-body>
        @foreach($invoices as $invoice)
            <x-layout-table-body-row :link="route('invoices.show', $invoice)">
                <x-layout-table-body-column>
                    {{ $invoice->state }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    {{ $invoice->name }} {{ $invoice->number }}
                </x-layout-table-body-column>

                <x-layout-table-body-column>
                    @if ($invoice->contact != null)
                        <div><i class="fa-solid fa-user pr-2"></i> {{ $invoice->contact->aanhef }} {{ $invoice->contact->achternaam }}</div>
                        @if($invoice->contact->des == 1)
                            <div><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                        @endif
                        @if($invoice->contact->des == 2)
                            <div><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                        @endif
                    @endif  
                </x-layout-table-body-column>
                    @if(isset($invoice->contact))
                        @if($invoice->contact->groothuis)
                            <x-layout-table-body-column>
                                {{ $invoice->contact->groothuis->project }} - {{ $invoice->contact->groothuis->omschrijving }}
                            </x-layout-table-body-column>
                        @else
                            <x-layout-table-body-column />
                        @endif
                    @endif
                <x-layout-table-body-column>
                    @if($invoice->bedrag)
                        {!! \App\Services\PriceService::displayVAT($invoice->bedrag) !!} incl. btw
                    @endif
                </x-layout-table-body-column>
            </x-layout-table-body-row>

        @endforeach
    </x-layout-table-body>
</x-layout-table-main>