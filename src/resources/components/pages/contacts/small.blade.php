<div>
    @if(isset($contact))
        <div>{{ $contact->aanhef }} {{ $contact->achternaam }}</div>
        <div>{{ $contact->straat }} {{ $contact->nummer }}</div>
        <div>{{ $contact->postcode }} {{ $contact->plaats }}</div>
    @else
        Geen contact gekozen
    @endif
</div>