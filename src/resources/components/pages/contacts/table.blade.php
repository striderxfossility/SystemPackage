<x-table-main>
    <x-table-head>
        <x-table-head-row>
            @if(!class_exists("\App\Enums\ContactState"))
                <x-table-head-column>
                    project
                </x-table-head-column>
            @endif
            <x-table-head-column>
                contact
            </x-table-head-column>
            <x-table-head-column>
                email
            </x-table-head-column>
            <x-table-head-column>
                telefoon
            </x-table-head-column>
            <x-table-head-column>
                adres
            </x-table-head-column>
            <x-table-head-column>
                offertes
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($contacts as $contact)

            @if(Route::current()->getName() == 'dashboard.contact.search' || Route::current()->getName() == 'dashboard.contact.search.search')
                @php($link = route('contacts.offer', $contact))
            @else
                @php($link = route('contacts.show', $contact))
            @endif

            <x-table-body-row :link="$link">
                @if(!class_exists("\App\Enums\ContactState"))
                    <x-table-body-column>
                        @if($contact->groothuis)
                            {{ $contact->groothuis->project }} - {{ $contact->groothuis->omschrijving }}
                        @endif
                    </x-table-body-column>
                @endif

                <x-table-body-column>
                    @if(!class_exists("\App\Enums\ContactState"))
                        <div class="text-blue-700">
                            <i class="fa-solid fa-user pr-2"></i> 
                                {{ $contact->aanhef }} {{ $contact->achternaam }}
                        </div>

                        @if($contact->des == 1)
                            <div class="text-purple-700 dark:text-purple-300"><i class="fa-solid fa-building pr-2"></i> Groothuisbouw</div>
                        @endif
                        @if($contact->des == 2)
                            <div class="text-purple-700 dark:text-purple-300"><i class="fa-solid fa-building pr-2"></i> ABC Arkenbouw</div>
                        @endif
                    @else
                        <div class="text-blue-700">
                            @if ($contact != null)
                                @if($contact->state != \App\Enums\ContactState::Company->value)
                                    <i class="fa-solid fa-user pr-2"></i> {{ $contact->first_name }} {{ $contact->last_name }}
                                @endif
                            @endif  
                        </div>
                        <div class="text-purple-700 dark:text-purple-300">
                            @if ($contact != null)
                                @if($contact->state == \App\Enums\ContactState::Company->value)
                                    <i class="fa-solid fa-building pr-2"></i> {{ $contact->first_name }}
                                @else
                                    @if($contact->company != null)
                                        <i class="fa-solid fa-building pr-2"></i> {{ $contact->company->first_name }}
                                    @endif
                                @endif
                            @endif
                        </div>
                    @endif
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->email }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->telefoon }} {{ $contact->mobile }}
                </x-table-body-column>

                <x-table-body-column>
                    <div>{{ $contact->straat }}</div>
                    <div>{{ $contact->postcode }}</div>
                    <div>{{ $contact->plaats }}</div>
                    <div>{{ $contact->adress }}</div>
                    <div>{{ $contact->zipcode }}</div>
                    <div>{{ $contact->city }}</div>
                </x-table-body-column>

                <x-table-body-column>
                    {{ $contact->offer_count }}
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>