@if(!$full)
    <div class="flex items-center justify-end mt-4">
        <button type="submit" name="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ $name }}
        </button>
    </div>
@else
    <button type="submit" style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} w-full text-xs mt-2 block text-center bg-{{ $color }}-400 hover:bg-{{ $color }}-300 rounded px-4 py-2 text-white shadow">
        {{ $name }}
    </button>
@endif