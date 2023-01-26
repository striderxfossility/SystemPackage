@if(isset($link))
    <tr class="bg-white dark:bg-gray-600 hover:bg-slate-100 dark:hover:bg-gray-500 border-b dark:border-slate-800 cursor-pointer" onclick="window.location.href = '{{ $link }}'">
        {{ $slot }}
    </tr>
@else
    <tr class="bg-white dark:bg-gray-600 border-b">
        {{ $slot }}
    </tr>
@endif