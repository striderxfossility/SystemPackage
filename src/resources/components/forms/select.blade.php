<label class='mt-4 block font-medium text-sm text-gray-700 dark:text-gray-300'>
    {{ $label }}
</label>

@if($changeLayout)
    <select onChange="changeLayout()" class="block dark:bg-gray-500 dark:text-gray-300 dark:border-slate-600 mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" name="layout" id="layout">
        {{ $slot }}
    </select>
@else
    <select onChange="changeLayout()" class="block dark:bg-gray-500 dark:text-gray-300 dark:border-slate-600 mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" id="{{ $name }}" name="{{ $name }}">
        {{ $slot }}
    </select>
@endif