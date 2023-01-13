<x-table-main>
    <x-table-head>
        <x-table-head-row>
            <x-table-head-column>
                Werkbonnummer
            </x-table-head-column>
            <x-table-head-column>
                Werkomschrijving
            </x-table-head-column>
            <x-table-head-column>
                Klant referentie
            </x-table-head-column>
            <x-table-head-column>
                Contact
            </x-table-head-column>
            <x-table-head-column>
                Materiaal
            </x-table-head-column>
            <x-table-head-column>
                Week
            </x-table-head-column>
        </x-table-head-row>
    </x-table-head>

    <x-table-body>
        @foreach($workorders as $workorder)
            <x-table-body-row :link="route('workorders.show', $workorder)">

                <x-table-body-column>
                    {{ $workorder->fullNumber }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $workorder->short_description }}
                </x-table-body-column>

                <x-table-body-column>
                    {{ $workorder->client_reference }}
                </x-table-body-column>

                <x-table-body-column>
                    <div class="text-blue-700">
                        @if ($workorder->contact != null)
                            @if($workorder->contact->state != \App\Enums\ContactState::Company->value)
                                <i class="fa-solid fa-user pr-2"></i> {{ $workorder->contact->first_name }} {{ $workorder->contact->last_name }}
                            @endif
                        @endif  
                    </div>
                    <div class="text-purple-700">
                        @if ($workorder->contact != null)
                            @if($workorder->contact->state == \App\Enums\ContactState::Company->value)
                                <i class="fa-solid fa-building pr-2"></i> {{ $workorder->contact->first_name }}
                            @else
                                @if ($workorder->company != null)
                                    <i class="fa-solid fa-building pr-2"></i> {{ $workorder->company->first_name }}
                                @elseif($workorder->contact->company != null)
                                    <i class="fa-solid fa-building pr-2"></i> {{ $workorder->contact->company->first_name }}
                                @endif
                            @endif
                        @endif
                    </div>
                </x-table-body-column>
                <x-table-body-column>
                    @php($matArray = [])
                    @foreach ($workorder->materialproduct as $materialproduct)
                        @if(isset($matArray[$materialproduct->material->src]))
                            @php($matArray[$materialproduct->material->src] = [
                                'amount' => $matArray[$materialproduct->material->src]['amount'] + $materialproduct->amount,
                                'name' => $materialproduct->material->name])
                        @else
                            @php($matArray[$materialproduct->material->src] = [
                                'amount' => $materialproduct->amount,
                                'name' => $materialproduct->material->name])
                        @endif
                    @endforeach

                    @foreach ($matArray as $key => $mat)
                        <div class="pb-2">
                            {{ $mat['amount'] }} x <img style="display:inline-block; width:50px" src="{{ asset('img/settings/material/' . $key)}}" /> {{ $mat['name'] }}
                        </div>
                    @endforeach
                </x-table-body-column>
                <x-table-body-column>
                    <div class="text-{{ $workorder->color }}-500">
                        Week {{ \App\Services\DateService::week($workorder->deadline_date) }}
                    </div>
                </x-table-body-column>
            </x-table-body-row>
        @endforeach
    </x-table-body>
</x-table-main>