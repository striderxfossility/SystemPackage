{!! $bottom ? '<div class="h-10">&nbsp;' : '' !!}
    @if($active)
        <div style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-yellow-400 dark:bg-yellow-800 rounded px-4 py-2 text-white shadow">
            {{ $slot }}
        </div>
    @else
        @if($confirm != '')
            <a style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" onclick="return confirm('{{ $confirm }}');" href="{{ $url }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-{{ $color }}-400 dark:bg-{{ $color }}-800 hover:bg-{{ $color }}-300 dark:hover:bg-{{ $color }}-700 rounded px-4 py-2 text-white shadow">
                {{ $slot }}
            </a>
        @else
            <a href="{{ $url }}" style="{{ $bottom ? 'width:calc(100% - 1rem)' : '' }}" class="{{ $bottom ? 'absolute bottom-2' : '' }} text-xs mt-2 block text-center bg-{{ $color }}-400 dark:bg-{{ $color }}-800 hover:bg-{{ $color }}-300 dark:hover:bg-{{ $color }}-700 rounded px-4 py-2 text-white dark:text-gray-300 shadow">
                {{ $slot }}
            </a>
        @endif
    @endif
{!! $bottom ? '</div>' : '' !!}

<div class="
    dark:bg-red-800 dark:hover:bg-red-700 dark:bg-purple-800 dark:hover:bg-purple-700 dark:bg-yellow-800 dark:hover:bg-yellow-700 dark:bg-green-800 dark:hover:bg-green-700 dark:bg-orange-800 dark:hover:bg-orange-700 dark:bg-blue-800 dark:hover:bg-blue-700
    bg-green-400 hover:bg-green-300 bg-orange-400 hover:bg-orange-300 dark:bg-slate-800 dark:hover:bg-slate-700
    text-blue-500 text-purple-500 text-red-500 text-green-500 text-indigo-500 text-yellow-500 text-emerald-500 text-orange-500
    bg-purple-300 bg-purple-400 hover:bg-purple-300
    bg-indigo-300 bg-indigo-400 hover:bg-indigo-300 
    bg-slate-300 bg-slate-400 hover:bg-slate-300
    hover:bg-orange-300 bg-blue-400 hover:bg-blue-300 bg-red-400 hover:bg-red-300 bg-yellow-400 hover:bg-yellow-300"> </div>
