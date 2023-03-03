@if(isset($link))
    <tr class="bg-white hover:bg-slate-100 border-b cursor-pointer" onclick="window.location.href = '{{ $link }}'">
        {{ $slot }}
    </tr>
@else
    <tr class="bg-white border-b">
        {{ $slot }}
    </tr>
@endif