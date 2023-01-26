<div class="relative uppercase font-bold text-xs mb-2 bg-slate-300 dark:bg-slate-800 -mt-4 -mx-4 p-2 text-slate-700 dark:text-slate-300">
    {{ $slot }}

    @if(isset($extra))
        <div class="absolute right-2 top-2">
            {!! $extra !!}
        </div>
    @endif
    
</div>