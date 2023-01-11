@if($label != 'hidden')
    <label class='mt-4 block font-medium text-sm text-gray-700'>
        {{ $label }}
    </label>

    <input class="block mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50 {{ $class }}" type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old($name) }}" />
@else
    <input class="{{ $class }}" type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old('achternaam') }}" />
@endif