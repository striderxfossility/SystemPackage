<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Contact
            </x-table-head-column>
            <x-table-head-column>
                Naam overledene
            </x-table-head-column>
            <x-table-head-column>
                Begraafplaats
            </x-table-head-column>
            <x-table-head-column>
                Grafnummer
            </x-table-head-column>
            <x-table-head-column>
                Del persoonsnummer
            </x-table-head-column>
            <x-table-head-column>
                Datum uitvoer
            </x-table-head-column>
            <x-table-head-column>
                Wat heb je gedaan
            </x-table-head-column>
            <x-table-head-column>
                Advies voor nu
            </x-table-head-column>
            <x-table-head-column>
                Advies toekomst
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($maintenances as $maintenance)
            <x-table-body-row :link="route('maintenances.show', $maintenance)">
                <x-table-body-column>
                    @if ($maintenance->contact != null)
                        <div class="text-blue-700">
                            @if ($maintenance->contact != null)
                                @if($maintenance->contact->state != \App\Enums\ContactState::Company->value)
                                    <i class="fa-solid fa-user pr-2"></i> {{ $maintenance->contact->first_name }} {{ $maintenance->contact->last_name }}
                                @endif
                            @endif  
                        </div>
                        <div class="text-purple-700">
                            @if ($maintenance->contact != null)
                                @if($maintenance->contact->state == \App\Enums\ContactState::Company->value)
                                    <i class="fa-solid fa-building pr-2"></i> {{ $maintenance->contact->first_name }}
                                @else
                                    @if ($maintenance->company != null)
                                        <i class="fa-solid fa-building pr-2"></i> {{ $maintenance->company->first_name }}
                                    @elseif($maintenance->contact->company != null)
                                        <i class="fa-solid fa-building pr-2"></i> {{ $maintenance->contact->company->first_name }}
                                    @endif
                                @endif
                            @endif
                        </div>
                    @endif  
                </x-table-body-column>
                <x-table-body-column>
                    {{ $maintenance->name_deceased }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $maintenance->cemetery }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $maintenance->grave_number }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ $maintenance->person_number_del }}
                </x-table-body-column>
                <x-table-body-column>
                    {{ \Jelle\Strider\DateService::get($maintenance->date) }}
                </x-table-body-column>
                <x-table-body-column>
                    @foreach($maintenance->maintenanceform as $maintenanceform)
                        {{ $maintenanceform->note }} <br />
                    @endforeach
                </x-table-body-column>
                <x-table-body-column>
                    @foreach($maintenance->maintenanceform as $maintenanceform)
                        {{ $maintenanceform->advies_nu }} <br />
                    @endforeach
                </x-table-body-column>
                <x-table-body-column>
                    @foreach($maintenance->maintenanceform as $maintenanceform)
                        {{ $maintenanceform->advies_toekomst }} <br />
                    @endforeach
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>