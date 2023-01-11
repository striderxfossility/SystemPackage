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