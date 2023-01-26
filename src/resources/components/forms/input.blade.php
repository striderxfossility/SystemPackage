@if($label != 'hidden')
    <label class='mt-4 block font-medium text-sm text-gray-700 dark:text-gray-300'>
        {{ $label }}
    </label>

    <input class="block mt-1 w-full dark:bg-gray-500 dark:text-gray-300 shadow-sm border-slate-300 dark:border-slate-600 focus:border-slate-300 dark:focus:border-slate-700 focus:ring focus:ring-slate-200 dark:focus:ring-slate-500 focus:ring-opacity-50 dark:focus:ring-opacity-300 {{ $class }}" type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old($name) }}" />
@else
    <input class="{{ $class }}" type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old('achternaam') }}" />
@endif