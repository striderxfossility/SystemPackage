<div class="
    bg-purple-400 hover:bg-purple-300 bg-orange-400 
    bg-indigo-400 hover:bg-indigo-300 bg-indigo-400 
    hover:bg-orange-300 bg-blue-400 hover:bg-blue-300 bg-red-400 hover:bg-red-300 bg-yellow-400 hover:bg-yellow-300"></div>

{!! $bottom ? '<div class="h-10">&nbsp;' : '' !!}
    @if($active)
        <div style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-yellow-400 rounded px-4 py-2 text-white shadow">
            {{ $slot }}
        </div>
    @else
        @if($confirm != '')
            <a style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" onclick="return confirm('{{ $confirm }}');" href="{{ $url }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-{{ $color }}-400 hover:bg-{{ $color }}-300 rounded px-4 py-2 text-white shadow">
                {{ $slot }}
            </a>
        @else
            <a href="{{ $url }}" style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-{{ $color }}-400 hover:bg-{{ $color }}-300 rounded px-4 py-2 text-white shadow">
                {{ $slot }}
            </a>
        @endif
    @endif
{!! $bottom ? '</div>' : '' !!}