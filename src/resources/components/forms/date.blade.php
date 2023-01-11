<label class='mt-4 block font-medium text-sm text-gray-700'>
    {{ $label }}
</label>

<input class="block mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" type="date" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old($name) }}" />