<div>
    @if(isset($contact))
        <div>{{ $contact->aanhef }} {{ $contact->achternaam }}</div>
        <div>{{ $contact->straat }} {{ $contact->nummer }}</div>
        <div>{{ $contact->postcode }} {{ $contact->plaats }}</div>

        <div>{{ $contact->salutation }} {{ $contact->first_name }} {{ $contact->last_name }}</div>
        <div>{{ $contact->adress }}</div>
        <div>{{ $contact->zipcode }}</div>
        <div>{{ $contact->city }}</div>
    @else
        Geen contact gekozen
    @endif
</div>