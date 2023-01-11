<label class='mt-4 block font-medium text-sm text-gray-700'>
    {{ $label }}
</label>

@if($fakeTextarea)
    <div id="fake_textarea" style="outline: none; --tw-ring-color: rgb(203 213 225 / 0.4); height:200px; border: 1px solid; border-color:rgb(203 213 225);" class="border-solid border-1 p-4 border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" contenteditable></div>
@endif

<textarea style="height:200px; {{ $fakeTextarea ? 'display:none;' : '' }}" class="block mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" id="{{ $name }}" name="{{ $name }}">{{ $value != '' ? $value : old($name) }}</textarea>