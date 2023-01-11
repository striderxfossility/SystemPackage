<div class="md:grid md:grid-cols-4 md:gap-10 mt-10">
    @if(isset($col_1))
        <x-layout-block>
            {!! $col_1 !!}
        </x-layout-block>
    @else
        <div></div>
    @endif
    @if(isset($col_2))
        <x-layout-block class="md:col-span-2">
            {!! $col_2 !!}
        </x-layout-block>
    @endif
    @if(isset($col_3))
        <x-layout-block>
            {!! $col_3 !!}
        </x-layout-block>
    @endif
</div>