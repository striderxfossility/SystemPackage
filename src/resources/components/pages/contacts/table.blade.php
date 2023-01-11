<x-table-main>
    <x-table-head>
        <x-layout.table.head-row>
            <x-layout.table.head-column>
                project
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                contact
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                email
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                telefoon
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                adres
            </x-layout.table.head-column>
            <x-layout.table.head-column>
                offertes
            </x-layout.table.head-column>
        </x-layout.table.head-row>
    </x-table-head>

    <x-table-body>
        @foreach($contacts as $contact)

            @if(Route::current()->getName() == 'dashboard.contact.search' || Route::current()->getName() == 'dashboard.contact.search.search')
                @php($link = route('contacts.offer', $contact))
            @else
                @php($link = route('contacts.show', $contact))
            @endif

            <x-table-body-row :link="$link">
                <x-table-body-column>
                    @if($contact->groothuis)
                        {{ $contact->groothuis->project }} - {{ $contact->groothuis->omschrijving }}
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    @if ($contact != null)
                        <div><i class="fa-solid fa-user pr-2"></i> {{ $contact->aanhef }} {{ $contact->achternaam }}</div>
                    @endif  
                    @if($contact->des == 1)
                        <div><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                    @endif
                    @if($contact->des == 2)
                        <div><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->email }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->telefoon }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->straat }}, {{ $contact->postcode }} te {{ $contact->plaats }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->offer_count }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>